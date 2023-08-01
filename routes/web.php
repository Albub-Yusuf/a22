<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('shop-owner-registration',[ShopOwnerController::class,'shopOwnerRegistration']);
Route::post('shop-owner-login',[ShopOwnerController::class,'shopOwnerLogin']);
Route::get('shop-owner-logout',[ShopOwnerController::class,'shopOwnerLogout']);
Route::get('dashboard',[ShopOwnerController::class,'dashboard'])->middleware(TokenVerificationMiddleware::class);
