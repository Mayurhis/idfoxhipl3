<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\UserLoginService;
use App\Models\User;
use Session;

class LoginController extends Controller
{   
  
    protected $userLoginService;
    function __construct(UserLoginService $userLoginService){
         $this->userLoginService = $userLoginService;
    }


    public function showLoginForm()
    {  
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $UserLoginService = new UserLoginService;
        //$result =  $UserLoginService->login($request); 
        $result =  $UserLoginService->IAMlogin($request); 
        dd($result);
        $code = 200;
        if($result['code'] == 200){
            $user = User::firstOrCreate(['email' => $request->email], ['email' =>  $request->email , 'password' => Hash::make($request->password)]);
            Auth::login($user);   
            $response = ["status" => true, "message" => "Login successfull"];
            return response()->json($response,$code);
        }else{
            
            // if($result['code'] == 422){
               
            //     //$data = json_decode($result['message']);
            
            //     $response = ["status" => false, "message" => $result['message']];
            // } else {
            //     $response = ["status" => false, "message" => $result['message']];
            // }
            //$response = ["status" => false, "message" => $result['message']];
            
            $code = $result['code'];
            return response()->json($result,$code);
        }
        
    }
    
    public function logout()
    {
        //$this->guard()->logout();
        auth()->logout();
        request()->session()->invalidate();
        Session::flush();
        return redirect()->route('admin.login');
    }
}
