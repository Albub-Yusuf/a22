<?php

namespace App\Http\Controllers;

use App\Models\ShopOwner;
use App\Helper\JWTToken;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShopOwnerController extends Controller
{
    function shopOwnerRegistration(Request $request){

        try{

            ShopOwner::create([

                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone'=>$request->input('phone')

            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Shop Owner Registration Completed Successfully!'
            ],200);

        }catch(Exception $e){

            return response()->json([
                'status' => 'failed',
                'message' => 'something went wrong!',
                'error' => $e
            ]);

        }
    }

    function shopOwnerLogin(Request $request){
        
        $shopOwnerPassword = ShopOwner::where('email',$request->input('email'))->select('password')->get();

        $hasShopOwner = ShopOwner::where('email',$request->input('email'))->where('password',Hash::check($request->input('email'),$shopOwnerPassword))->select('id')->first();

        if($hasShopOwner !=null){
           
            $token = JWTToken::CreateToken($request->input('email'),$hasShopOwner->id);

            return response()->json([
                'status' => 'success',
                'message' => 'Login Successful!'
            ],200)->cookie('token',$token,60*60*24);
        }else{
            return response()->json([
                'status'=>'failed',
                'message'=>'unauthorized'
            ],401);
        }

    }

    
    function shopOwnerLogout(){
        return redirect('/')->cookie('token','',-1);
    }

    function dashboard(Request $request){
        $shopOwnerId = $request->header('shopOwnerId');

        $shopOwnerName = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first(); 
        $pageTitle = 'Dashboard';
        $totalUser = ShopOwner::count();
      
        return view('pages.dashboard.dashboard',['title'=>$pageTitle,'shopOwnerName'=>$shopOwnerName,'totalCustomer'=>$totalUser]);

    }
}
