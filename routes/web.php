<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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
Route::get('/test1',[TestController::class,'Test1']);
Route::get('/test2',[TestController::class,'Test2']);
Route::get('/test3',[TestController::class,'Test3']);
Route::post('/test4',[TestController::class,'Test4'])->name('test4');

