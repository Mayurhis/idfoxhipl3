<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use App\DataTables\DashboardDataTable;
use App\DataTables\KycDataTable;
use App\Models\Customer;
use App\Models\Brand;
class HomeController extends Controller
{
    use HttpRequestTrait;

    public function dashboard(DashboardDataTable $dataTable){ 
        try{

             $loggedInUserDetails = session()->get('logged_in_user_detail');
            $accessTokenData = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $loggedInUserDetails['data']['access_token'] )[1]))));
            $userType = $loggedInUserDetails['data']['user']['type'];
            $aud = $accessTokenData->aud;
            if(is_null($aud) || $aud == '' ){
                
                $aud_type = "null";
                $audience = $aud;
            }else{
                
                if(is_array($aud)){
                    $aud_type = "array";
                    $audience = base64_encode(serialize($aud));
                }else{
                    $aud_type = "string";
                    $audience = base64_encode($aud);
                }    
            }
            
            
            $customerCount  = $this->getRequest('customers/count')['count'];
            switch ($userType) {
                case 'admin':
                case 'user':
                $brandsGetUrl = 'brands';
                $brandCount = $this->getRequest('brands/count')['count']; 
                
                break;
                case 'auditor':
                $brandsGetUrl = 'brands?aud_type='.$aud_type.'&aud='.$audience; 
                $brandCount = $this->getRequest('brands/count?aud_type='.$aud_type.'&aud='.$audience)['count'];     
                
                break;
                default:
                $brandsGetUrl = 'brands'; 
                $brandCount = $this->getRequest('brands/count')['count'];
                 
            }


            $brandList = $this->getRequest($brandsGetUrl)['data'];
            return $dataTable->render('admin.dashboard', compact('customerCount', 'brandCount', 'brandList')); 

        }catch(\Throwable $th){
            //dd($th);
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }
              
    }

    public function kyc_request(KycDataTable $dataTable){
        try{

            $kycGetUrl = 'kyc-request';
            $kycRequestData = $this->getRequest($kycGetUrl);
            return $dataTable->render('admin.kyc_request', compact('kycRequestData'));
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }
        
    }
}
