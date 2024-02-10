<?php

namespace App\Http\Controllers\Kyc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use App\Http\Requests\Kyc\KycStoreStepFirstRequest;
use App\Http\Requests\Kyc\KycStoreStepSecondRequest;
use App\Http\Requests\Kyc\KycStoreStepThirdRequest;
use App\Http\Requests\Kyc\KycStoreStepFourthRequest;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class KycVerificationController extends Controller
{  
    use HttpRequestTrait;

    private $apiHeaders;

    function __construct(){
         
         $this->apiHeaders['Content-Type'] = config("api.kyc.headers.content_type");
         $this->apiHeaders['Accept'] = config("api.kyc.headers.accept");
         $this->apiHeaders['Authorization-Token'] = config("api.kyc.headers.authorization");
    }

    public function index(Request $request){
        $token = $request->token;
        $isValid = $this->checkTokenValidity($token);
        $countries  = [];
        if($isValid){
           
            $url = 'countries/active/';
            $apiHeaders  = $this->apiHeaders;
            $result = $this->getRequest($url);
            $countries = $result['data'];
            $data = json_decode(base64_decode($token),true);

            $customerId     = $data['secret_key'];
            $customerUrl    = 'kyc/get-customer-detail/'.$customerId;
            $customerData   = $this->getRequest($customerUrl);
            $customerData   = $customerData['data'];
            $brand_name = $customerData['brand']['title'];
            $brandUrl = 'kyc/get-brand-data/'.$brand_name;
            $brand_Data = $this->getRequest($brandUrl);
            $brand_details = $brand_Data['data']['brand_detail'];
            $countryId = $customerData['address'][0]['country_id'];
            $kycConfigurationUrl = 'kyc/get-kyc-configuration-data/'.$countryId;
            $kycConfigurationData = $this->getRequest($kycConfigurationUrl);
            $kycConfigurationDetails = $kycConfigurationData['data'];
            return view('kyc.index',compact('data','countries','brand_details','customerData','kycConfigurationDetails'));
        }

        return view('kyc.error');     
        
    }

    public function checkTokenValidity($token){
        $data = json_decode(base64_decode($token),true);
        //dd($data);
        // $email = $data['email'];
        // $secretKey = $data['secret_key'];
        $expireTimestamp = $data['expire_timestamp'];
        $currantTimestamp = Carbon::now()->timestamp;
        return  $currantTimestamp  <= $expireTimestamp ? true : false;
        
        // $assignedToken = Cache::get("invite_token");
        // return  $assignedToken  == $token ? true : false;
    }

    public function storeStep1(KycStoreStepFirstRequest $request)
    {   
        $data = $request->except('_token');
        if(!empty($request->session()->get('kyc-form-data'))){
            $request->session()->forget('kyc-form-data');
        }

        $request->session()->put('kyc-form-data', $data);
        $countryId = $request->session()->get('kyc-form-data')['country_id'];
        $kycConfigurationUrl = 'kyc/get-kyc-configuration-data/'.$countryId;
        $kycConfigurationData = $this->getRequest($kycConfigurationUrl);
        $kycConfigurationDetails = $kycConfigurationData['data'];

        $sessionData = $request->session()->get('kyc-form-data');
        //dd($kycConfigurationDetails);
        
        if(isset($kycConfigurationDetails['configuration']) && $kycConfigurationDetails['configuration'] != ''){
            if(str_contains($kycConfigurationDetails['configuration'], 'photo_id_image') || str_contains($kycConfigurationDetails['configuration'], 'liveliness_image') || str_contains($kycConfigurationDetails['configuration'], 'address_image')){
                return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
            }else{
                $this->customerSave($sessionData);
                
            }    
        }else{
            return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
        }
        
         
    }

    public function storeStep2(KycStoreStepSecondRequest $request)
    {
        $data = $request->except('_token');
        $stepForm1Data = $request->session()->get('kyc-form-data');

        if($request->hasFile('photoIdImage')){

            $image = $request->file('photoIdImage');
            $tempPath = storage_path('app/temp');
            $photoIDfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($tempPath, $photoIDfilename);
            $step2Data['photoIdImage'] = $photoIDfilename;
            $step2Data['PhotoIdRadio'] = $request->input('PhotoIdRadio');
        }

        $dataWithStepForm2 = array_merge($stepForm1Data,$step2Data);
        $request->session()->put('kyc-form-data', $dataWithStepForm2);
        $sessionData = $request->session()->get('kyc-form-data');
        

        $countryId = $request->session()->get('kyc-form-data')['country_id'];
        $kycConfigurationUrl = 'kyc/get-kyc-configuration-data/'.$countryId;
        $kycConfigurationData = $this->getRequest($kycConfigurationUrl);
        $kycConfigurationDetails = $kycConfigurationData['data'];
        if(isset($kycConfigurationDetails['configuration']) && $kycConfigurationDetails['configuration'] != ''){
            if(str_contains($kycConfigurationDetails['configuration'], 'liveliness_image') || str_contains($kycConfigurationDetails['configuration'], 'address_image')){
                return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
            }else{
                $this->customerSave($sessionData);
                
            }    
        }else{
            return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
        }
        
    }



    public function storeStep3(KycStoreStepThirdRequest $request)
    {
        $data = $request->except('_token');
        $dataWithStep2 = $request->session()->get('kyc-form-data');

        if($request->hasFile('liveImage')){

            $image = $request->file('liveImage');
            $tempPath = storage_path('app/temp');
            $livefilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($tempPath, $livefilename);
            $step3Data['liveImage'] = $livefilename;
        }

        $dataWithStepForm3 = array_merge($dataWithStep2,$step3Data);
        
        $request->session()->put('kyc-form-data', $dataWithStepForm3);
        $sessionData = $request->session()->get('kyc-form-data');

        $countryId = $request->session()->get('kyc-form-data')['country_id'];
        $kycConfigurationUrl = 'kyc/get-kyc-configuration-data/'.$countryId;
        $kycConfigurationData = $this->getRequest($kycConfigurationUrl);
        $kycConfigurationDetails = $kycConfigurationData['data'];

        if(isset($kycConfigurationDetails['configuration']) && $kycConfigurationDetails['configuration'] != ''){
            if(str_contains($kycConfigurationDetails['configuration'], 'address_image')){
                return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
            }else{
                $this->customerSave($sessionData);
                
            }    
        }else{
            return response()->json(['status' => true, "message" => 'form submitted', 'data' => $data], 200);
        }
        
        
    }


    public function storeStep4(KycStoreStepFourthRequest $request)
    {

        $data = $request->except('_token');
        $dataWithStep3 = $request->session()->get('kyc-form-data');

        if($request->hasFile('addressImage')){

            $image = $request->file('addressImage');
            $tempPath = storage_path('app/temp');
            $addressfilename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($tempPath, $addressfilename);

            $step4Data['addressImage'] = $addressfilename;
            $step4Data['addressRadio'] = $request->input('addressRadio');
        }

        $dataWithStepForm4 = array_merge($dataWithStep3,$step4Data);
        $request->session()->put('kyc-form-data', $dataWithStepForm4);
        $sessionData = $request->session()->get('kyc-form-data');
        
        $this->customerSave($sessionData);
    }

    public function customerSave($sessionData){
        //dd('session',$sessionData);
        $url = 'kyc/saveCustomer';
        $multipart =  [
             [
                'name' => 'id',
                'contents' => $sessionData['id'],
            ],
            [
                'name' => 'first_name',
                'contents' => $sessionData['first_name'],
            ],
            [
                'name' => 'middle_name',
                'contents' => $sessionData['middle_name'],
            ],
            [
                'name' => 'last_name',
                'contents' => $sessionData['last_name'],
            ],
            [
                'name' => 'prefix',
                'contents' => $sessionData['prefix'],
            ],
            [
                'name' => 'suffix',
                'contents' => $sessionData['suffix'],
            ],
            [
                'name' => 'dob',
                'contents' => date('Y-m-d',strtotime($sessionData['dob'])),
            ],
            [
                'name' => 'gender',
                'contents' => $sessionData['gender'],
            ],
            [
                'name' => 'address_line_1',
                'contents' => $sessionData['address_line_1'],
            ],
            [
                'name' => 'address_line_2',
                'contents' => $sessionData['address_line_2'],
            ],
            [
                'name' => 'post_code',
                'contents' => $sessionData['post_code'],
            ],
            [
                'name' => 'city',
                'contents' => $sessionData['city'],
            ],
            [
                'name' => 'region',
                'contents' => $sessionData['region'],
            ],
            [
                'name' => 'country_id',
                'contents' => $sessionData['country_id'],
            ],
            [
                'name' => 'email',
                'contents' => $sessionData['email'],
            ],
            [
                'name' => 'mobile_number',
                'contents' => $sessionData['mobile_number'],
            ],
            [
                'name' => 'brand_id',
                'contents' => $sessionData['brand_id'],
            ]

        ];
       
        if(isset($sessionData['PhotoIdRadio']) && $sessionData['PhotoIdRadio'] != ''){ 

         $multipart[] = [
                'name' => 'PhotoIdRadio',
                'contents' => $sessionData['PhotoIdRadio'],
            ];

           
        }    

        if(isset($sessionData['addressRadio']) && $sessionData['addressRadio'] != ''){ 

         $multipart[] = [
                'name' => 'addressRadio',
                'contents' => $sessionData['addressRadio'],
            ];

           
        } 

         if(isset($sessionData['photoIdImage']) && $sessionData['photoIdImage'] != ''){ 
            $multipart[] = [
                'name' => 'photoIdImage',
                'contents' => file_get_contents(storage_path('app/temp/'.$sessionData['photoIdImage'])),// file_get_contents($filePath),
                'filename' => $sessionData['photoIdImage'],
            ];

           
        }
        
        if(isset($sessionData['liveImage']) && $sessionData['liveImage'] != ''){ 
             $multipart[] = [
                'name' => 'liveImage',
                'contents' => file_get_contents(storage_path('app/temp/'.$sessionData['liveImage'])),// file_get_contents($filePath),
                'filename' => $sessionData['liveImage'],
            ];
           
        }

        if(isset($sessionData['addressImage']) && $sessionData['addressImage'] != ''){ 
            $multipart[] = [
                'name' => 'addressImage',
                'contents' => file_get_contents(storage_path('app/temp/'.$sessionData['addressImage'])),// file_get_contents($filePath),
                'filename' => $sessionData['addressImage'],
            ];

        }

        //dd($multipart);
        
        $postReponse = $this->postRequest($url,$sessionData,'','multipart',$multipart);
        //dd($postReponse);
    }

   public function getUploadOptions($id){

        $url = 'kyc/get-upload-options/'.$id;
        $responseData = $this->getRequest($url);
        $photoIdListing = [];
        $addressListing= [];
        foreach($responseData['data'] as $response){
            switch($response['upload_type']) {
            case 'photo_id_image':
                $photoIdArr = ['id' => $response['id'],'title' => $response['title']];
                array_push($photoIdListing,$photoIdArr);
                break;
            case 'address_proof_image':
                $addressArr = ['id' => $response['id'],'title' => $response['title']];
                array_push($addressListing,$addressArr);
                break;
            default:
                
            }
        }
        $htmlPhotoIdListing =  view("kyc.form_steps.upload_options.photo_uplaod_options",compact('photoIdListing'))->render();
        $htmlAddressListing =  view("kyc.form_steps.upload_options.address_uplaod_options",compact('addressListing'))->render();
        return response()->json(['htmlPhotoIdListing' => $htmlPhotoIdListing, 'htmlAddressListing' => $htmlAddressListing],200);
    }

    public function getBrandData($brand_name){
        $url = 'kyc/get-brand-data/'.$brand_name;
        $responseData = $this->getRequest($url);
        return response()->json($responseData,200);
    }

    public function getCustomerDetail($customerId){
        $url = 'kyc/get-customer-detail/'.$customerId;
        $responseData = $this->getRequest($url);
        return response()->json($responseData,200);
    }

    


}
