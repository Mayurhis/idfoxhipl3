<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAdminApiHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {    
        // $authKey = $request->header('Authorization');
        $contentType = $request->header('Content-Type');
        $acceptType = $request->header('Accept');
        dd($contentType,$acceptType);
        if ($this->validateHeaders($contentType,$acceptType)) {
            // if($this->isValidApiKey($authKey)) {
            //     return $next($request);
            // }else{
            //     return response()->json(['status' => false,'error' => 'Unauthorized'], 401);
            // }
        }else{
            return response()->json(['status' => false,'error' => 'Invalid headers'], 412);
        }   
        
    }

    /**
     * Validating  headers of incoming request 
     * @param  $contentType 
     * @param  $acceptType
    */

    private function validateHeaders($contentType,$acceptType)
    {     
        return $contentType === config("api.admin.headers.content_type") &&  $acceptType ===  config("api.admin.headers.accept");
    }

    /**
     * Validating api secret of incoming request 
     * @param  $authKey
    */
    // 
    // private function isValidApiKey($authKey)
    // {   
    //     return $authKey === config("api.kyc.headers.authorization");
    // }

    
}
