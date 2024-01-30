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
       
        $code = 200;
        if($result['code'] == 200){
            $user = User::firstOrCreate(['email' => $request->email], ['email' =>  $request->email , 'password' => Hash::make($request->password)]);
            Auth::login($user); 
            // $accessTokenData = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $result['response']['data']['access_token'] )[1]))));
           
            // if($result['response']['data']['user']['aud'] == ''){
                
            // } else {
               
            // }

            $this->saveLoggedInUserDetailInSession(array_merge($result['response'], ['password' => $request->password]));
            $response = ["status" => true, "message" => "Login successfull"];
            return response()->json($response,$code);
        }else{

            $code = $result['code'];
            return response()->json($result,$code);
        }
        
    }
    
    public function logout()
    {
        // $loggedInUserDetails = session()->get('logged_in_user_detail');
        //     dd($loggedInUserDetails);
        // $UserLoginService = new UserLoginService;
        // $result =  $UserLoginService->IAMlogout(); 
        // dd($result);
        auth()->logout();
        request()->session()->invalidate();
        Session::flush();
        return redirect()->route('admin.login');
    }

    private function saveLoggedInUserDetailInSession($result){
        session()->put('logged_in_user_detail',$result);
        session()->save();
    }
}
