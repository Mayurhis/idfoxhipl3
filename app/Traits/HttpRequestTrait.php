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
            //dd($body);
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
            dd($body);
            return json_decode($body, true);
        }catch (ConnectException $e) {
           
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage() , 'data' => []];
        } catch(ClientException $e){
            dd($e);
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => json_decode( $e->getResponse()->getBody()), 'data' => []];
        } catch(\Exception $e){
             dd($e);
            $result = ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()];
        }
        dd($result);
        return $result;

    }
}
