<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TodoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[SiteController::class,'home']);
Route::get('/login',[SiteController::class,'login']);
Route::post('/login',[SiteController::class,'confirm_login']);
Route::get('/register',[SiteController::class,'register']);
Route::post('/register',[SiteController::class,'register_confirm']);
Route::get('/logout', [SiteController::class, 'logout']);

Route::get('/new_todo',[TodoController::class,'new_todo']);
Route::post('/new_todo',[TodoController::class,'confirm_new_todo']);
Route::get('/dashboard',[TodoController::class,'dashboard']);
Route::get('/delete/{id}',[TodoController::class,'delete']);
Route::get('/complete/{id}',[TodoController::class,'complete']);





