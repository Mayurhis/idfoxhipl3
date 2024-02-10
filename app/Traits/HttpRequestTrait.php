<?php

namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ClientException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Firebase\JWT\JWT;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

trait HttpRequestTrait
{    

    public $apiUrl =  "https://apitest.hipl-staging3.com/api/v1/";
    public $headers;

    public function __construct()
    {
        $lang = app()->getLocale();

        $this->headers = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'accepted-lang' => $lang,
            'secret-token' => env('IAM_SECRET'),
        ];
    }


    public function getRequest($url, $params = '')
    {   
       try {
            $loggedInUserDetails = session()->get('logged_in_user_detail');
            $secretToken = $loggedInUserDetails['data']['access_token'];
            $client    = new Client(['verify' => false]);
            $url = $this->apiUrl.$url;
            if ($params != "") {
                $url = $url . "?" . $params;
            }
            $headers = [
                'accept' => 'application/json',
                'Authorization' => 'Bearer '.$secretToken,
            ];
            
            $response =  $client->request('GET', $url, [
                'headers' => $headers,
            ]); 

            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        }catch (ConnectException $e) {
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage(), 'data' => []];
        } catch(ClientException $e){
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
        return response()->json($response);
    }

    
    public function postRequest($url,$body = null, $params = "",$formType = '', $formData = '')
    {  
       try {

            $loggedInUserDetails = session()->get('logged_in_user_detail');
            $secretToken = $loggedInUserDetails['data']['access_token'];
            $headers = [
                'accept' => 'application/json',
                'accepted-lang' => app()->getLocale(),
                'Authorization' => 'Bearer '.$secretToken,
            ];

            if($formType !== 'multipart'){
                $headers['Content-Type'] = 'application/json';
            }

            $url = $this->apiUrl.$url;
            $client = new Client(); 
            $response = $client->request('POST', $url, [
                $formType => $formData,
                'headers' => $headers
            ]);
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        }catch (ConnectException $e) {
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage() , 'data' => []];
        } catch(ClientException $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }

        return $result;
    }

    public function patchRequest($url,$body = null, $params = "",$formType = '', $formData = '')
    {    
        try {
            $loggedInUserDetails = session()->get('logged_in_user_detail');
            $secretToken = $loggedInUserDetails['data']['access_token'];
            $headers = [
                'accept' => 'application/json',
                'accepted-lang' => app()->getLocale(),
                'Authorization' => 'Bearer '.$secretToken,
            ];

            if($formType !== 'multipart'){
                $headers['Content-Type'] = 'application/json';
            }
            
            $url = $this->apiUrl.$url;
          
            $client = new Client();
           
            $response = $client->request('PATCH', $url, [
                $formType => $formData,
                'headers' => $headers,
                
            ]);

            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        }catch (ConnectException $e) {
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode($e->getResponse()->getBody()), 'data' => []];
        } catch(ClientException $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }

        return $result;
    }

    public function deleteRequest($url)
    {
         try {
            $client    = new Client(['verify' => false]);
            $url = $this->apiUrl.$url;
            $loggedInUserDetails = session()->get('logged_in_user_detail');
            $secretToken = $loggedInUserDetails['data']['access_token'];
            $headers = [
                'accept' => 'application/json',
                'accepted-lang' => app()->getLocale(),
                'Authorization' => 'Bearer '.$secretToken,
            ];
            $response =  $client->request('DELETE', $url, [
                'headers' => $headers,
            ]); 
            $body = $response->getBody()->getContents();
            
            return json_decode($body, true);
            
        }catch (ConnectException $e) {
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode($e->getResponse()->getBody()), 'data' => []];
        } catch(ClientException $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
        return $result;
    }

    public function IAMGetRequest($url)
    {  
       
       try {
        
            $loggedInUserDetails = session()->get('logged_in_user_detail');
   
            $headers = [
                'Authorization' => 'Bearer '.$loggedInUserDetails['data']['access_token'],
                'Content-Type' => 'application/json',
                //'Accept' => 'application/json'
            ];
            $client    = new Client();
            
            $response =  $client->request('GET', $url, [
                'headers' => $headers,
            ]); 
            $body = $response->getBody()->getContents();
            $result = ['status' => true, 'code' => 200, 'message' => 'Logout successfully' , 'response' => json_decode($body, true)];
            return $result;
        }catch (ConnectException $e) {
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage(), 'data' => []];
        } catch(ClientException $e){
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
   
        return response()->json($response);
    }

    public function IAMPostRequest($url, $formData){
        try {
            
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $client = new Client(); 
            $response = $client->request('POST', $url, [
                'json' => $formData,
                'headers' => $headers
            ]);
            
            $body = $response->getBody()->getContents();
         
            $result = ['status' => true, 'code' => 200, 'message' => 'Login successfull' , 'response' => json_decode($body, true)];
           
            return $result;
        }catch (ConnectException $e) {
           
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage() , 'data' => []];
        } catch(ClientException $e){
            
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody(),true), 'data' => []];
        } catch(\Exception $e){
            
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
        return $result;

    }
}
