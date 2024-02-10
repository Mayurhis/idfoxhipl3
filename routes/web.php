<?php



use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\Auth\LoginController;


/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/



Route::group(["name" => "front","namespace" => "App/Http/Controllers"],function(){
    Route::get('/', function () {
        return redirect()->route("admin.login");
    }); 
});

Route::view("kyc/verification","kyc.index");
Route::get('logout/{tokenInvalid?}', [LoginController::class, 'logout'])->name('logout')->middleware('is-access-token-expire');
Route::middleware(['guest'])->group(function () {
    Route::get("admin/login", [LoginController::class, 'showLoginForm'])->name("admin.login");
    
});

Route::post("admin/login", [LoginController::class, 'login'])->name("admin.login_submit");

Route::group(["namespace" => "App\Http\Controllers\Admin",'as' => 'admin.',"prefix" => "admin" ,'middleware' => ['auth','is-access-token-expire']],function(){

        Route::get("dashboard","HomeController@dashboard")->name("dashboard");

        Route::get("kyc-request","HomeController@kyc_request")->name("kyc_request"); // Need to remove this

        Route::get("brands/customer-list","BrandController@customerList")->name("brands.customerlist");

        Route::get('customers/getUploadOptions/{id}/{customerID}', "CustomerController@getUploadOptions")->name('customers.getUploadOptions');

        Route::post('email-template-update-status', 'EmailTemplateController@updateStatus')->name('email-templates.updateStatus');

        Route::get('customers/profile', 'CustomerController@profile')->name('customers.profile');
       
        Route::resources([

            "brands" => "BrandController",

            "customers" => "CustomerController",

            "upload-options" => "UploadOptionController",
            
            "email-templates" => "EmailTemplateController",

            "kyc-configurations" => "KycConfigurationController",

        ]);



});



Route::group(["namespace" => "App\Http\Controllers\Kyc",'as' => 'kyc.',"prefix" => "kyc"],function(){

    Route::get("verification/{token}","KycVerificationController@index")->name("kyc-verification");
    Route::post("verification/store-step1","KycVerificationController@storeStep1")->name("storeStep1");
    Route::post("verification/store-step2","KycVerificationController@storeStep2")->name("storeStep2");
    Route::post("verification/store-step3","KycVerificationController@storeStep3")->name("storeStep3");
    Route::post("verification/store-step4","KycVerificationController@storeStep4")->name("storeStep4");
    Route::get('verification/get-upload-options/{id}', "KycVerificationController@getUploadOptions")->name('get-upload-options');
    Route::get('verification/get-brand-data/{brand_name}', "KycVerificationController@getBrandData")->name('get-brand-data');
    Route::get('verification/get-customer-detail/{customer_id}', "KycVerificationController@getCustomerDetail")->name('get-customer-detail');


});





