<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use App\DataTables\DashboardDataTable;
use App\Models\Customer;
use App\Models\Brand;
class HomeController extends Controller
{
    use HttpRequestTrait;

    public function dashboard(DashboardDataTable $dataTable){ 
        // $url = 'http://127.0.0.1:8000/api/v1/brands';
        // $url = route('api.brand.index');
        // $headers = [
        //     'Content-Type' => 'application/json',
        //     'Accept' => 'application/json'
        // ];
        // $data = $this->getRequest($url, $headers);

        $loggedInUserDetails = session()->get('logged_in_user_detail');
        $accessTokenData = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $loggedInUserDetails['data']['access_token'] )[1]))));
        $userType = $loggedInUserDetails['data']['user']['type'];
        //dd($loggedInUserDetails);
        $aud = $accessTokenData->aud;
        //$aud = 'LL44V4899D1T';//['LL44V4899D1T','LL44V4899D1U'];
        if(is_null($aud) && $aud == '' ){

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
    }

    public function kyc_request(){
        return view("admin.kyc_request.index");
    }
}
