<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('login',function (){
        return view('admin/login');
    })->name('loginUI');
    Route::post('login',"Admin\LoginController@index")->name('loginProcess');

    Route::group(['middleware'=>'adminLogin'],function(){
        Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
    });
});

Route::get('login','Admin\LoginController@getLoginTest');
Route::post('login','Admin\LoginController@postLoginTest');

Route::get('','Admin\LoginController@postLoginTest');
