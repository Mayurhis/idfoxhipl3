<?php

namespace App\Services;

use App\Traits\HttpRequestTrait;
use Illuminate\Http\Request;


class KYCVerification
{
    use HttpRequestTrait;

   
    public $baseUrl;
    public $token;
    public $headers = [];

    /**
     * __construct
     */
    public function __construct()
    {
        $this->token           = '123456789';
        $this->baseUrl          = "http://localhost:8000/";
        $this->headers          = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ];
    }


    public function getCountries(Request $request)
    {   
        //$url = "";
        //return $this->getRequest($url);
    }

}
