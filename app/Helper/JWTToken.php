<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Psr7\Request;

class JWTToken{

    public static function CreateToken($shopOwnerEmail,$shopOwnerId){

        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'laravel-jwt-token-a22',
            'iat' => time(),
            'exp' => time()+60*60,
            'shopOwnerEmail' => $shopOwnerEmail,
            'shopOwnerId' => $shopOwnerId
        ];

        return JWT::encode($payload,$key,'HS256');

    }

    public static function VerifyToken($token){

        try{

            if($token == null){
                return "unauthorized";
            }else{
                $key = env('JWT_KEY');
                $decode = JWT::decode($token,new Key($key,'HS256'));
                return $decode;
            }

        }catch(Exception $e){
            return "unauthorized";
        }

    }


}