<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use App\DataTables\DashboardDataTable;

class BrandController extends Controller
{
    use HttpRequestTrait;
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $brandsGetUrl = 'brands'; 
        $brand = $this->getRequest($brandsGetUrl);
        return view("admin.brand.index",compact('brand'));
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {   
        $languageUrl = "languages" ;
        $languageData = $this->getRequest($languageUrl);
        return view("admin.brand.create",compact('languageData'));
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
        $storeUrl = 'brands'; 
        $multipart =  [
            [
                'name' => 'domain',
                'contents' => $request->domain,
            ],
            [
                'name' => 'title',
                'contents' => $request->title,
            ],
            [
                'name' => 'display_name',
                'contents' => $request->display_name,
            ],
            [
                'name' => 'display_logo',
                'contents' => $request->display_logo,
            ],
            [
                'name' => 'theme',
                'contents' => $request->theme,
            ],
            [
                'name' => 'accent_color',
                'contents' => $request->accent_color,
            ],
            [
                'name' => 'button_color',
                'contents' => $request->button_color,
            ],
            [
                'name' => 'defaul_language',
                'contents' => $request->defaul_language,
            ],
            [
                'name' => 'approval_method',
                'contents' => $request->approval_method,
            ]
        ];

        if(isset($request->logo) && $request->file('logo')){ 
            $multipart[] = [
                'name' => 'logo',
                'contents' => fopen($request->file('logo')->path(), 'r'),
                'filename' => $request->file('logo')->getClientOriginalName(),
            ];
        }

        $postReponse = $this->postRequest($storeUrl,$postData,'','multipart', $multipart);

        return response()->json($postReponse, $postReponse['code']);

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)
    {
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    

    public function edit($id)
    {
        $brandsEditUrl = 'brands/'.$id.'/edit';
        $brand = $this->getRequest($brandsEditUrl);
        //dd($brand);
        $languageUrl = "languages" ;
        $languageData = $this->getRequest($languageUrl);
        return view("admin.brand.edit",compact('brand','languageData'));
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
        $updateUrl = 'brands/update/'.$id; 
        $multipart =  [
          
            [
                'name' => 'domain',
                'contents' => $request->domain,
            ],
            [
                'name' => 'title',
                'contents' => $request->title,
            ],
            [
                'name' => 'display_name',
                'contents' => $request->display_name,
            ],
            [
                'name' => 'display_logo',
                'contents' => $request->display_logo,
            ],
            [
                'name' => 'theme',
                'contents' => $request->theme,
            ],
            [
                'name' => 'accent_color',
                'contents' => $request->accent_color,
            ],
            [
                'name' => 'button_color',
                'contents' => $request->button_color,
            ],
            [
                'name' => 'defaul_language',
                'contents' => $request->defaul_language,
            ],
            [
                'name' => 'approval_method',
                'contents' => $request->approval_method,
            ],
            
        ];

        if(isset($request->logo) && $request->file('logo')){ 
            $multipart[] = [
                'name' => 'logo',
                'contents' => fopen($request->file('logo')->path(), 'r'),
                'filename' => $request->file('logo')->getClientOriginalName(),
            ];
        }
        
        
        $postReponse = $this->postRequest($updateUrl,$postData,'','multipart', $multipart);
       
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
        $url = 'brands/'.$id;
        $responseData = $this->deleteRequest($url);
        return response()->json($responseData);
    }


    public function customerList(DashboardDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.customer');
    }

}

