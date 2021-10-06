<?php

use App\Http\Controllers\usercontroller;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::view('/register','register');
Route::POST('/login', [usercontroller::class,'index']);
Route::POST('/register', [usercontroller::class,'register']);
Route::get('/', [productController::class,'index']);
Route::get('detail/{id}', [productController::class,'detail']);
Route::get('/search', [productController::class,'search']);
Route::POST('/addtocart', [productController::class,'addtocart']);
Route::get('/cartlist', [productController::class,'cartlist']);
Route::get('removecart/{id}', [productController::class,'removecart']);
Route::get('/ordernow', [productController::class,'ordernow']);
Route::post('/orderplace', [productController::class,'orderplace']);
Route::get('/myorder', [productController::class,'myorder']);