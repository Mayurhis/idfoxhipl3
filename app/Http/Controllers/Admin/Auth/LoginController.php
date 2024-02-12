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
        $result =  $UserLoginService->IAMlogin($request); 
       
        $code = 200;
        if($result['code'] == 200){
            $user = User::firstOrCreate(['email' => $request->email], ['email' =>  $request->email , 'password' => Hash::make($request->password)]);
            Auth::login($user); 
            $this->saveLoggedInUserDetailInSession(array_merge($result['response'], ['password' => $request->password]));
            $url = null;
            if($result['response']){
            $userType = $result['response']['data']['user']['type'];
                switch ($userType) {
                    case 'admin':
                            $url = route('admin.dashboard');
                            
                        break;
                    case 'auditor':
                           $url = route('admin.brands.index');
                        break;
                    case 'user':
                           $url = route('admin.customers.profile');
                        break;

                    default:
                        $url = route('admin.dashboard');
                        break;
                }  
                

            }
            //$loggedInUserDetails = session()->get('logged_in_user_detail');
            //dd($loggedInUserDetails);
            $response = ["status" => true, "message" => "Login successfull",'url'=>$url];
            return response()->json($response,$code);
        }else{

            $code = $result['code'];
            return response()->json($result,$code);
        }
        
    }
    
    public function logout(Request $request, $tokenInvalid = null)
    {

        $loggedInUserDetails = session()->get('logged_in_user_detail');
        $accessTokenData = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $loggedInUserDetails['data']['access_token'] )[1]))));
        $UserLoginService = new UserLoginService;
        $result =  $UserLoginService->IAMlogout(); 
        //dd($result);
        if($result['response']['status'] == 'success'){
            auth()->logout();
            request()->session()->invalidate();
            Session::flush();
            $user = User::where('email',$accessTokenData->email)->delete();
            if(!is_null($tokenInvalid)){
                return redirect()->route('admin.login')->with(['alert-type'=>'error','message'=>'Jwt Token is invalid, so you are logout forcefully!']);    
            }
            return redirect()->route('admin.login');
        }
        

        
    }

    private function saveLoggedInUserDetailInSession($result){
        session()->put('logged_in_user_detail',$result);
        session()->save();
    }
}
