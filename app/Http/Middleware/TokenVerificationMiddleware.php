<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       

        $token = $request->cookie('token');
        $result = JWTToken::VerifyToken($token);

        if($result=="unauthorized"){
            return response()->json(['message'=>'access denied!'],401);
        }else{
           $request->headers->set('shopOwnerEmail',$result->shopOwnerEmail);
           $request->headers->set('shopOwnerId',$result->shopOwnerId); 

           return $next($request);
        }


        

    }
}
