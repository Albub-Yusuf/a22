<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopOwnerController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::post('shop-owner-registration',[ShopOwnerController::class,'shopOwnerRegistration']);
Route::post('shop-owner-login',[ShopOwnerController::class,'shopOwnerLogin']);
Route::get('shop-owner-logout',[ShopOwnerController::class,'shopOwnerLogout']);

// Pages

Route::get('/registration',[PageController::class,'shopOwnerRegistrationPage']);
Route::get('/',[PageController::class,'shopOwnerLoginPage']);
Route::get('dashboard',[ShopOwnerController::class,'dashboard'])->middleware(TokenVerificationMiddleware::class);
