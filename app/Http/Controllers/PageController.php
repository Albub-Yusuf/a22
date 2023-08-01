<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
   
    function shopOwnerRegistrationPage(){
        $data['title'] = 'Registration';
        return view('pages.shopOwner.registration',$data);
    }

    function shopOwnerLoginPage(){
        $data['title'] = 'Login';
        return view('pages.shopOwner.login',$data);
    }

   

}
