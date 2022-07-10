<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::view('index','insert');

Route::post('insertData',[App\Http\Controllers\ProductController::class,'insert']);
Route::get('home',[ App\Http\Controllers\ProductController::class,'readdata']);

//Route::view('update','updateview');
Route::get('updatedelete',[ App\Http\Controllers\ProductController::class,'updateordelete']);
Route::get('updatedata',[ App\Http\Controllers\ProductController::class,'update']);