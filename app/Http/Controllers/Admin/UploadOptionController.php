<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UploadOptionDataTable;
use App\Traits\HttpRequestTrait;

class UploadOptionController extends Controller
{
    use HttpRequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UploadOptionDataTable $dataTable)
    {
        try{
            return $dataTable->render("admin.upload_options.index");
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }    
    }

    public function create()
    { 
        try{
            $url = 'countries/active/';
            $countries = $this->getRequest($url);
            
            if ($countries) { 
                $countriesList = $countries['data'];
                return view("admin.upload_options.create", compact('countriesList'));
            } else {
                $errorMessage = $response->json('message');
            }
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
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
        try{
            $postData = $request->except('_token');
            
            $storeUrl = 'upload-options'; 

            $multipart =  [
                [
                    'name' => 'title',
                    'contents' => $request->title,
                ],
                [
                    'name' => 'country_id',
                    'contents' => $request->country_id,
                ],
                [
                    'name' => 'upload_type',
                    'contents' => $request->upload_type,
                ],
                [
                    'name' => 'is_default_document',
                    'contents' => $request->is_default_document,
                ]
            ];

            if(isset($request->image) && $request->file('image')){ 
                $multipart[] = [
                    'name' => 'image',
                    'contents' => fopen($request->file('image')->path(), 'r'),
                    'filename' => $request->file('image')->getClientOriginalName(),
                ];
            }

            $postReponse = $this->postRequest($storeUrl,$postData,'','multipart', $multipart); 
            
            return response()->json($postReponse, $postReponse['code']);
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }    
    }

    public function edit($id)
    {
        try{
            $uploadOption = $this->getRequest('upload-options/'.$id.'/edit');
            $countries = $this->getRequest('countries/active/');
            if ($countries && $uploadOption) {
                $countriesList = $countries['data'];
                return view("admin.upload_options.edit",compact('uploadOption','countriesList'));
            } else {
                $errorMessage = $response->json('message');
            }
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
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
        try{
            $postData = $request->except('_method','_token');
            
            $updateUrl = 'upload-options/update/'.$id; 

            $multipart =  [
                [
                    'name' => 'title',
                    'contents' => $request->title,
                ],
                [
                    'name' => 'country_id',
                    'contents' => $request->country_id,
                ],
                [
                    'name' => 'upload_type',
                    'contents' => $request->upload_type,
                ],
                [
                    'name' => 'is_default_document',
                    'contents' => $request->is_default_document,
                ]
            ];
            
            if(isset($request->delete_existing_image) && $request->delete_existing_image){ 
                $multipart[] = [
                    'name' => 'delete_existing_image',
                    'contents' => $request->delete_existing_image,
                ];
            }
            
            if(isset($request->image) && $request->file('image')){ 
                $multipart[] = [
                    'name' => 'image',
                    'contents' => fopen($request->file('image')->path(), 'r'),
                    'filename' => $request->file('image')->getClientOriginalName(),
                ];
            }
            
            $postReponse = $this->postRequest($updateUrl,$postData,'','multipart', $multipart);

            return response()->json($postReponse, $postReponse['code']);
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $url = 'upload-options/'.$id;
            $responseData = $this->deleteRequest($url);
            return response()->json($responseData);
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }    
    }
}
