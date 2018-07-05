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

Route::get('/admin/login', 'Admin\LoginController@getLogin')->name('admin.get.login');

Route::get('/admin/password_reset', function () {
    return view('admin.forgot_password');
})->name('/admin.get.resetPassword');

Route::post('/admin/password_reset', 'Admin\LoginController@postResetPassword');

Route::get('/admin', function () {
    return redirect()->route('admin.get.login');
});
Route::post('/admin/login', 'Admin\LoginController@postLogin')->name('admin.post.login');

Route::middleware('checkAuth')->group(function () {
    Route::prefix("admin")->group(function () {
        Route::get('admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});


Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
