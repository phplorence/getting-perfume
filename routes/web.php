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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {

    Route::get('/trang-chu', 'HomeController@index')->name('home');

    Auth::routes();
    Route::prefix('trang-chu')->group(function () {

        // Authentication Routes...
        Route::get('/dang-nhap', 'Auth\LoginController@showLoginForm')->name('user.login');
        Route::post('/dang-nhap', 'Auth\LoginController@login')->name('user.login.submit');
        Route::post('/dang-xuat', 'Auth\LoginController@logout')->name('user.logout');

        // Registration Routes...
        Route::get('/dang-ki', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
        Route::post('/dang-ki', 'Auth\RegisterController@register')->name('user.register.submit');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('user.password.request');;

        Route::get('/', 'HomeController@index')->name('home');




    });

    Route::prefix('quan-tri')->group(function () {
        Route::get('/dang-nhap', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/dang-nhap', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/dang-xuat', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');
        Route::get('/', 'Perfume\AdminHomeController@index')->name('admin.dashboard');

        // Content Navigation Bar
        Route::get('/nuoc-hoa', 'Perfume\AdminPerfumeController@perfume')->name('admin.perfume');
        Route::get('/them-nuoc-hoa', 'Perfume\AdminPerfumeController@perfumeNew')->name('admin.perfume.add');

        Route::get('/tai-khoan', 'Perfume\AdminProfileController@index')->name('admin.profile');
        Route::get('/cap-cao', 'Perfume\AdminSuperController@index')->name('admin.super.dashboard');
        Route::get('/cap-cao/them', 'Perfume\AdminSuperController@show')->name('admin.super.form');
        Route::post('/cap-cao/them', 'Perfume\AdminSuperController@add')->name('admin.super.form.add');

        Route::get('/thanh-toan', 'Perfume\AdminInvoiceController@index')->name('admin.invoice');

    });
});

