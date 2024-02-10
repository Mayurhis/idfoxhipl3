<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\EmailTemplateDataTable;
use App\Traits\HttpRequestTrait;


class EmailTemplateController extends Controller
{
    use HttpRequestTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmailTemplateDataTable $dataTable)
    {
        try{
            return $dataTable->render("admin.email-templates.index");
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $emailTemplate = $this->getRequest('email-templates/'.$id.'/edit');
            if ($emailTemplate) {
                return view("admin.email-templates.edit",compact('emailTemplate'));
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
            $updateUrl = 'email-templates/update/'.$id; 
            $postReponse = $this->postRequest($updateUrl,$postData,'','json', $postData);

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
        //
    }

    public function updateStatus(Request $request)
    {
        try{
            $postData = $request->except('_token');
            $updateStatusUrl = 'email-templates/update-status'; 
            $postReponse = $this->postRequest($updateStatusUrl,$postData,'','json', $postData);
            return response()->json($postReponse, $postReponse['code']);
        }catch(\Throwable $th){
            return redirect()->route('logout',['tokenInvalid' => 'token_invalid']);
        }
    }
}
