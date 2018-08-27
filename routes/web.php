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

        Route::prefix("menu")->group(function(){

            Route::get('show','Admin\CategoriesController@getCategories')->name('admin.menu');

            Route::get('/{menu1?}/{menu2?}','Admin\CategoriesController@showPage')->name('admin.dashboard');
        });

        Route::get('user_info','Admin\UserController@getCurrentUser')->name('admin.currentUser');

        Route::prefix("user")->group(function(){
            Route::get('info','Admin\UserController@getUserInfo')->name('admin.user.info');
            Route::get('changePassword','Admin\UserController@getChangePassword')->name('user.get.changePassword');
            Route::post('changePassword','Admin\UserController@postChangePassword')->name('user.post.changePassword');
        });
        Route::resources([
            'user'=>'Admin\UserController'
        ]);
    });
});


Route::get('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('sendMail','Admin\MailController@send');
