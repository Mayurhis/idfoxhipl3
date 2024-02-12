<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\KycConfigurationDataTable;
use App\Traits\HttpRequestTrait;

class KycConfigurationController extends Controller
{
    use HttpRequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KycConfigurationDataTable $dataTable)
    {
        
        return $dataTable->render("admin.kyc_configurations.index");
        
    }

    public function create()
    { 
        $url = 'countries/active/';
        $countries = $this->getRequest($url);
        
        if ($countries) { 
            $countriesList = $countries['data'];
            return view("admin.kyc_configurations.create", compact('countriesList'));
        } else {
            $errorMessage = $response->json('message');
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $postData = $request->except('_token');
        $storeUrl = 'kyc-configurations'; 
        $multipart =  [
            [
                'name' => 'country_id',
                'contents' => $request->country_id,
            ],
            [
                'name' => 'status',
                'contents' => $request->status,
            ],
        ];

        if(isset($request->configuration)){ 

         $multipart[] = [
                'name' => 'configuration',
                'contents' => implode(',',$request->configuration),
            ];

           
        }  

        
        $postReponse = $this->postRequest($storeUrl,$postData,'','multipart', $multipart); 
        //dd($postReponse);
        return response()->json($postReponse, $postReponse['code']);
   
    }

    public function edit($id)
    {
    
        $kycConfiguration = $this->getRequest('kyc-configurations/'.$id.'/edit');
        $countries = $this->getRequest('countries/active/');
        if ($countries && $kycConfiguration) {
            $countriesList = $countries['data'];
            return view("admin.kyc_configurations.edit",compact('kycConfiguration','countriesList'));
        } else {
            $errorMessage = $response->json('message');
        }
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
        
        $updateUrl = 'kyc-configurations/update/'.$id; 

        $multipart =  [
            [
                'name' => 'country_id',
                'contents' => $request->country_id,
            ],
            [
                'name' => 'status',
                'contents' => $request->status,
            ],
        ];

        if(isset($request->configuration)){ 

         $multipart[] = [
                'name' => 'configuration',
                'contents' => implode(',',$request->configuration),
            ];

           
        }
        
        $postReponse = $this->postRequest($updateUrl,$postData,'','multipart', $multipart);
        //dd($postReponse);
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
        $url = 'kyc-configurations/'.$id;
        $responseData = $this->deleteRequest($url);
        return response()->json($responseData);
    }
}
