<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/products/get",[ProductController::class,'index']);
Route::get("/categories/get",[CategoryController::class,'index']);
Route::get("/categories/get/{id}",[CategoryController::class,'getYourProducts']);
Route::post("/product/create",[ProductController::class,'create']);
Route::get("/products/filtred/",[ProductController::class,'filtred']);
