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

        $brandCount = $this->getRequest('brands/count')['count'];
        $customerCount  = $this->getRequest('customers/count')['count'];  
        $bandList = $this->getRequest('brands')['data']; 
        return $dataTable->render('admin.dashboard', compact('customerCount', 'brandCount', 'bandList'));       
    }

    public function kyc_request(){
        return view("admin.kyc_request.index");
    }
}
