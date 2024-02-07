<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        $loggedInUserDetails = session()->get('logged_in_user_detail');
        if($loggedInUserDetails){
            $userType = $loggedInUserDetails['data']['user']['type'];
            switch ($userType) {
                case 'admin':
                        return  redirect()->route('admin.dashboard');    
                    break;
                case 'auditor':
                        return  redirect()->route('admin.brands.index'); 
                    break;
                case 'user':
                        return  redirect()->route('admin.customers.profile');  
                    break;

                default:
                    return  redirect()->route('admin.dashboard');  
                    break;
            }  
            

        }
        
        return $next($request);
       
    }
}
