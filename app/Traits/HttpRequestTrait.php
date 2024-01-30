<?php

namespace App\Traits;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ClientException;



trait HttpRequestTrait
{    

    public $apiUrl = "https://apitest.hipl-staging3.com/api/v1/";
    public $headers;

    public function __construct()
    {
        $lang = app()->getLocale();

        $this->headers = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'accepted-lang' => $lang,
        ];
    }


    public function getRequest($url, $params = '')
    {   
       try {
            $client    = new Client(['verify' => false]);
            $url = $this->apiUrl.$url;
            if ($params != "") {
                $url = $url . "?" . $params;
            }
            
            $response =  $client->request('GET', $url, [
                'headers' => $this->headers,
            ]); 
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        }catch (ConnectException $e) {
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage(), 'data' => []];
        } catch(ClientException $e){
            // dd($e->getMessage(),'fsdf');
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            //dd($e->getMessage());
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
    //    dd($response);
        return response()->json($response);
    }

    
    public function postRequest($url,$body = null, $params = "",$formType = '', $formData = '')
    {  
       try {
           
            $headers = [
                'accept' => 'application/json',
                'accepted-lang' => app()->getLocale(),
            ];

            if($formType !== 'multipart'){
                $headers['Content-Type'] = 'application/json';
            }

            $url = $this->apiUrl.$url;
            //dd($url);
            $client = new Client(); 
            $response = $client->request('POST', $url, [
                $formType => $formData,
                'headers' => $headers
            ]);
            
            $body = $response->getBody()->getContents();
            //dd($body);
            return json_decode($body, true);
        }catch (ConnectException $e) {
            //dd($e);
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage() , 'data' => []];
        } catch(ClientException $e){
            //dd($e);
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
            //dd($e);
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }

        return $result;
    }

    public function patchRequest($url,$body = null, $params = "",$formType = '', $formData = '')
    {    
        try {
           
            $headers = [
                'accept' => 'application/json',
                'accepted-lang' => app()->getLocale(),
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
            
            $response =  $client->request('DELETE', $url, [
                'headers' => $this->headers,
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
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://iam.scancheck.io:9999/api/logout',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => array(
        //     'Content-Type: application/json',
        //     'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiIiLCJlbWFpbCI6ImFkbWluLmhpc0BleGFtcGxlLmNvbSIsImV4cCI6MTcwNjU5Njg1OCwiaWF0IjoxNzA2NTk1NjU4LCJpc3MiOiJpYW0uc2NhbmNoZWNrLmlvIiwibWV0YWRhdGEiOm51bGwsIm5iZiI6MTcwNjU5NTY1OCwicm9sZSI6IiIsInN1YiI6ImlUS0VlY1pKeXhDWmhlVHJUVnIyN2UifQ.GZhwkaZQ2YLhob2f54JObqHDzzSNRNjQs0r8LVpjYf0'
        // ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;
        // die; 
       try {
            $loggedInUserDetails = session()->get('logged_in_user_detail');
        //     dd($loggedInUserDetails);
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
            dd($result);
            return $result;
            //return json_decode($body, true);
        }catch (ConnectException $e) {
            $response = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage(), 'data' => []];
        } catch(ClientException $e){
            dd($e);
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
        //dd($result);
        return $result;

    }
}
