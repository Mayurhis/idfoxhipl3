<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use App\DataTables\CustomerDataTable;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use HttpRequestTrait;
    
    
    public function __construct()
    {     
    
    }

    public function index(CustomerDataTable $dataTable)
    {   
        
        $bandList = $this->getRequest('brands')['data'];     
        return $dataTable->render('admin.customers.index', compact('bandList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $url = 'countries/active/';
        $bandList = $this->getRequest('brands')['data'];
        $countries = $this->getRequest($url);
        $brand = $this->getRequest($url);
       
        $countriesList = $countries['data'];
        return view("admin.customers.create", compact('countriesList','bandList'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = 'customers/'.$id;
        $responseData = $this->getRequest($url,$id);
        $customerData = $responseData['customers'];
        return view("admin.customers.show", compact('customerData'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = 'countries/active';
        $countries = $this->getRequest($url);
        $bandList = $this->getRequest('brands')['data'];
        $customerUrl = 'customers/'.$id.'/edit';
        $customers = $this->getRequest($customerUrl);
        $countriesList = $countries['data'];
        $customer = $customers['data']; 
        $getCustomerBrand = $this->getRequest('customers/get-customers-brand/'.$customer['brand_id'])['data']; 
        $exists = false;
        foreach ($bandList as $item) {
            if ($getCustomerBrand[0]['id'] === $item['id']) {
                $exists = true;
            }
        }
        if(!$exists){
            $bandList = array_merge($bandList,$getCustomerBrand);
        }
        return view("admin.customers.edit", compact('customer','countriesList','bandList','getCustomerBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $url = 'customers';
        $multipart =  [
            [
                'name' => 'first_name',
                'contents' => $request->first_name,
            ],
            [
                'name' => 'middle_name',
                'contents' => $request->middle_name,
            ],
            [
                'name' => 'last_name',
                'contents' => $request->last_name,
            ],
            [
                'name' => 'prefix',
                'contents' => $request->prefix,
            ],
            [
                'name' => 'suffix',
                'contents' => $request->suffix,
            ],
            [
                'name' => 'dob',
                'contents' => date('Y-m-d',strtotime($request->dob)),
            ],
            [
                'name' => 'gender',
                'contents' => $request->gender,
            ],
            [
                'name' => 'address_line_1',
                'contents' => $request->address_line_1,
            ],
            [
                'name' => 'address_line_2',
                'contents' => $request->address_line_2,
            ],
            [
                'name' => 'post_code',
                'contents' => $request->post_code,
            ],
            [
                'name' => 'city',
                'contents' => $request->city,
            ],
            [
                'name' => 'region',
                'contents' => $request->region,
            ],
            [
                'name' => 'country_id',
                'contents' => $request->country_id,
            ],
            [
                'name' => 'email',
                'contents' => $request->email,
            ],
            [
                'name' => 'mobile_number',
                'contents' => $request->mobile_number,
            ],
            [
                'name' => 'brand_id',
                'contents' => $request->brand_id,
            ],
            [
                'name' => 'approval_type',
                'contents' => $request->approval_type,
            ],
            [
                'name' => 'status',
                'contents' => $request->status,
            ],
            [
                'name' => 'verification_status',
                'contents' => $request->status == 'approved' ? '1' : '0' ,
            ],
            [
                'name' => 'PhotoIdRadio',
                'contents' => $request->PhotoIdRadio,
            ],
            [
                'name' => 'AddressPhotoRadio',
                'contents' => $request->AddressPhotoRadio,
            ]

        ];
        if(isset($request->photoIdImage) && $request->file('photoIdImage')){ 
            $multipart[] = [
                'name' => 'photoIdImage',
                'contents' => fopen($request->file('photoIdImage')->path(), 'r'),
                'filename' => $request->file('photoIdImage')->getClientOriginalName(),
            ];
        }

        if(isset($request->addressImage) && $request->file('addressImage')){ 
            $multipart[] = [
                'name' => 'addressImage',
                'contents' => fopen($request->file('addressImage')->path(), 'r'),
                'filename' => $request->file('addressImage')->getClientOriginalName(),
            ];
        }

        if(isset($request->liveImage) && $request->file('liveImage')){ 
            $multipart[] = [
                'name' => 'liveImage',
                'contents' => fopen($request->file('liveImage')->path(), 'r'),
                'filename' => $request->file('liveImage')->getClientOriginalName(),
            ];
        }
        $postReponse = $this->postRequest($url,$request->all(),'','multipart',$multipart);
        return response()->json($postReponse, $postReponse['code']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $postData = $request->except('_method','_token');
        $updateUrl = 'customers/update/'.$id;
        $multipart =  [
            [
                'name' => 'first_name',
                'contents' => $request->first_name,
            ],
            [
                'name' => 'middle_name',
                'contents' => $request->middle_name,
            ],
            [
                'name' => 'last_name',
                'contents' => $request->last_name,
            ],
            [
                'name' => 'prefix',
                'contents' => $request->prefix,
            ],
            [
                'name' => 'suffix',
                'contents' => $request->suffix,
            ],
            [
                'name' => 'dob',
                'contents' => date('Y-m-d',strtotime($request->dob)),
            ],
            [
                'name' => 'gender',
                'contents' => $request->gender,
            ],
            [
                'name' => 'address_line_1',
                'contents' => $request->address_line_1,
            ],
            [
                'name' => 'address_line_2',
                'contents' => $request->address_line_2,
            ],
            [
                'name' => 'post_code',
                'contents' => $request->post_code,
            ],
            [
                'name' => 'city',
                'contents' => $request->city,
            ],
            [
                'name' => 'region',
                'contents' => $request->region,
            ],
            [
                'name' => 'country_id',
                'contents' => $request->country_id,
            ],
            [
                'name' => 'email',
                'contents' => $request->email,
            ],
            [
                'name' => 'mobile_number',
                'contents' => $request->mobile_number,
            ],
            [
                'name' => 'brand_id',
                'contents' => $request->brand_id,
            ],
            [
                'name' => 'approval_type',
                'contents' => $request->approval_type,
            ],
            [
                'name' => 'status',
                'contents' => $request->status,
            ],
            [
                'name' => 'verification_status',
                'contents' => $request->status == 'approved' ? 1 : 0 ,
            ],
            [
                'name' => 'PhotoIdRadio',
                'contents' => $request->PhotoIdRadio,
            ],
            [
                'name' => 'AddressPhotoRadio',
                'contents' => $request->AddressPhotoRadio,
            ]
        ];
        if(isset($request->photoIdImage) && $request->file('photoIdImage')){ 
            $multipart[] = [
                'name' => 'photoIdImage',
                'contents' => fopen($request->file('photoIdImage')->path(), 'r'),
                'filename' => $request->file('photoIdImage')->getClientOriginalName(),
            ];
        }

        if(isset($request->addressImage) && $request->file('addressImage')){ 
            $multipart[] = [
                'name' => 'addressImage',
                'contents' => fopen($request->file('addressImage')->path(), 'r'),
                'filename' => $request->file('addressImage')->getClientOriginalName(),
            ];
        }

        if(isset($request->liveImage) && $request->file('liveImage')){ 
            $multipart[] = [
                'name' => 'liveImage',
                'contents' => fopen($request->file('liveImage')->path(), 'r'),
                'filename' => $request->file('liveImage')->getClientOriginalName(),
            ];
        }

        $postReponse = $this->postRequest($updateUrl,$postData,'','multipart',$multipart);
        return response()->json($postReponse, $postReponse['code']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = 'customers/'.$id;
        $responseData = $this->deleteRequest($url);
        return response()->json($responseData);
    }


    public function getUploadOptions($id,$customer_id=null){
        
        $url = 'customers/getUploadOptions/'.$id;
        $responseData = $this->getRequest($url);

        $kycConfigurationUrl = 'kyc/get-kyc-configuration-data/'.$id;
        $kycConfigurationData = $this->getRequest($kycConfigurationUrl);
        $kycConfigurationDetails = ($kycConfigurationData) ? $kycConfigurationData['data'] : [];

        $photoIdListing = [];
        $addressListing= [];
        foreach($responseData['data'] as $response){
            switch($response['upload_type']) {
            case 'photo_id_image':
                $photoIdArr = ['id' => $response['id'],'title' => $response['title'], 'status' => '1'];
                array_push($photoIdListing,$photoIdArr);
                break;
            case 'address_proof_image':
                $addressArr = ['id' => $response['id'],'title' => $response['title'], 'status' => '1'];
                array_push($addressListing,$addressArr);
                break;
            default:
                
            }
        }
        $customer = [];
        if($customer_id){
            $customerUrl = 'customers/'.$customer_id;
            $customer = $this->getRequest($customerUrl);
            $customer = $customer['customers']; 

            $getCustomersUploadOptionUrl = 'customers/get-customers-upload-options/'.$customer_id;

            $uploadOptionData = $this->getRequest($getCustomersUploadOptionUrl);
            $uploadOptionData =  $uploadOptionData['data'];
        
            foreach( $uploadOptionData as $key => $value){

                if($value['upload_type'] == 'photo_id_image'){

                    if (count($photoIdListing) > 0) {
                        $found = collect($photoIdListing)->pluck('id')->contains($value['id']);
                    
                        if (!$found) {
                            $photoIdOptionArr = ['id' => $value['id'],'title' => $value['title'], 'status' => '0'];
                            array_push($photoIdListing,$photoIdOptionArr);
                        } 
                    } else {
                        $photoIdOptionArr = ['id' => $value['id'],'title' => $value['title'], 'status' => '0'];
                        array_push($photoIdListing,$photoIdOptionArr);
                    }

                }

                if($value['upload_type'] == 'address_proof_image'){
                    if (count($addressListing) > 0) {
                        $found = collect($addressListing)->pluck('id')->contains($value['id']);
                    
                        if (!$found) {
                            $addressIdOptionArr = ['id' => $value['id'],'title' => $value['title'], 'status' => '0'];
                            array_push($addressListing,$addressIdOptionArr);
                        } 
                    } else {
                        $addressIdOptionArr = ['id' => $value['id'],'title' => $value['title'], 'status' => '0'];
                        array_push($addressListing,$addressIdOptionArr);
                    }

                }
            }
        }

        if(!empty($addressListing) && !empty($photoIdListing)){
            $html =  view("admin.customers.uploadOptions",compact('photoIdListing','addressListing','customer','kycConfigurationDetails'))->render();
            return response()->json($html);
        }else{
            return response()->json(['success' => false, 'message' => 'Add default Upload Options to move forward to the next step'], 400);
        }
                
    }


    /**
     * Display the specified profile as pr user login.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $loggedInUserDetails = session()->get('logged_in_user_detail');
        $email = base64_encode($loggedInUserDetails['data']['user']['email']);
        $url = 'customers/profile/'.$email;
        $responseData = $this->getRequest($url,$email);
        $customerProfileData = $responseData['customers'];

        return view("admin.customers.profile", compact('customerProfileData'));
    }

}
