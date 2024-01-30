<?php

namespace App\Services;

use App\Traits\HttpRequestTrait;
use Illuminate\Http\Request;
use PDO;

class UserLoginService
{
    use HttpRequestTrait;

   
    // public $baseUrl;
    // public $token;
    // public $headers = [];

    /**
     * __construct
     */
    public function __construct()
    {     
        //$this->token           = config("api.kyc.headers.authorization");
        // $this->baseUrl          = env('APP_URL');
        // $this->headers          = [
        //     //'Authorization-Token' => $this->token,
        //     'Accept' => config("api.kyc.headers.accept"),
        //     'Content-Type' => config("api.kyc.headers.content_type"),
           
        // ];
    }
    public function login(Request $request)
    {  
        $credentials =  [ 
            "email" => $request->email,
            "password" => $request->password
        ];
        $url = "login"; 
        $response =  $this->postRequest($url,$credentials,'','json',$credentials);
        return $response;
    }

    public function IAMlogin(Request $request)
    {  
        $credentials =  [ 
            "email" => $request->email,
            "password" => $request->password
        ];
        $url = "https://iam.scancheck.io:9999/api/login"; 
        $response =  $this->IAMPostRequest($url,$credentials);
        return $response;
    }

    public function IAMlogout()
    {   
        $url = "https://iam.scancheck.io:9999/api/logout"; 
        $response =  $this->IAMGetRequest($url);
        return $response;
    }

    public function IAMGetNewAccessToken($postData, $refreshToken){
        $url = "https://iam.scancheck.io:9999/api/refresh/".$refreshToken; 
        $response =  $this->IAMPostRequest($url,$postData);
        return $response;
    }

}
