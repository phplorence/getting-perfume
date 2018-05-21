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

    Route::get('/', 'HomeController@index')->name('home');

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

        Route::get('/', 'Backend\AdminHomeController@index')->name('admin.dashboard');

        // Un development
        Route::get('/tai-khoan', 'Backend\AdminProfileController@show')->name('admin.profile');
        Route::get('/thanh-toan', 'Backend\AdminInvoiceController@index')->name('admin.invoice');

        // TAB ADMIN
        Route::get('/cap-cao', 'Backend\Manager\Super\SuperController@index')->name('admin.super.index');
        Route::get('/cap-cao/them', 'Backend\Manager\Super\SuperController@create')->name('admin.super.create');
        Route::post('/cap-cao', 'Backend\Manager\Super\SuperController@store')->name('admin.super.store');
        Route::get('/cap-cao/chi-tiet/{id_admin}', 'Backend\Manager\Super\SuperController@show')->name('admin.super.detail');
        Route::post('/cap-cao/sua', 'Backend\Manager\Super\SuperController@update')->name('admin.super.update');
        Route::get('/cap-cao/xoa/{id_admin}', 'Backend\Manager\Super\SuperController@delete')->name('admin.super.delete');
        Route::get('/cap-cap/tim-kiem', 'Backend\Manager\Super\SuperController@search')->name('admin.super.search');

        // TAB PERFUME
        Route::get('/nuoc-hoa', 'Backend\AdminPerfumeController@perfume')->name('admin.perfume.index');
        Route::get('/nuoc-hoa/them', 'Backend\AdminPerfumeController@create')->name('admin.perfume.create');
        Route::post('/nuoc-hoa', 'Backend\AdminPerfumeController@store')->name('admin.perfume.store');

        // TAB TABLES
        Route::get('/nuoc-hoa/nong-do', 'Backend\Tables\ConcentrationController@index')->name('admin.perfume.concentration.index');
        Route::post('/nuoc-hoa/nong-do', 'Backend\Tables\ConcentrationController@store')->name('admin.perfume.concentration.store');
        Route::post('/nuoc-hoa/nong-do/sua', 'Backend\Tables\ConcentrationController@update')->name('admin.perfume.concentration.update');
        Route::get('/nuoc-hoa/nong-do/xoa/{id}', 'Backend\Tables\ConcentrationController@delete')->name('admin.perfume.concentration.delete');

        Route::get('/nuoc-hoa/nhom-huong', 'Backend\Tables\IncenseController@index')->name('admin.perfume.incense.index');
        Route::get('/nuoc-hoa/nhom-huong/loading_incense', 'Backend\Tables\IncenseController@incenseDataTables')->name('admin.perfume.incense.index.incenseDataTables');
        Route::post('/nuoc-hoa/nhom-huong', 'Backend\Tables\IncenseController@store')->name('admin.perfume.incense.store');
        Route::get('/nuoc-hoa/nhom-huong/{id}', 'Backend\Tables\IncenseController@show')->name('admin.perfume.incense.detail');
        Route::post('/nuoc-hoa/nhom-huong/sua', 'Backend\Tables\IncenseController@update')->name('admin.perfume.incense.update');
        Route::get('/nuoc-hoa/nhom-huong/xoa/{id_incense}', 'Backend\Tables\IncenseController@delete')->name('admin.perfume.incense.delete');

        Route::get('/nuoc-hoa/phong-cach', 'Backend\Tables\StyleController@index')->name('admin.perfume.style.index');
        Route::get('/nuoc-hoa/phong-cach/loading_incense', 'Backend\Tables\StyleController@styleDataTables')->name('admin.perfume.style.index.styleDataTables');
        Route::post('/nuoc-hoa/phong-cach', 'Backend\Tables\StyleController@store')->name('admin.perfume.style.store');
        Route::get('/nuoc-hoa/phong-cach/{id}', 'Backend\Tables\StyleController@show')->name('admin.perfume.style.detail');
        Route::post('/nuoc-hoa/phong-cach/sua', 'Backend\Tables\StyleController@update')->name('admin.perfume.style.update');
        Route::get('/nuoc-hoa/phong-cach/xoa/{id_style}', 'Backend\Tables\StyleController@delete')->name('admin.perfume.style.delete');

        Route::get('/nuoc-hoa/nha-pha-che', 'Backend\Tables\AuthorController@index')->name('admin.perfume.author.index');
        Route::get('/nuoc-hoa/nha-pha-che/loading_author', 'Backend\Tables\AuthorController@authorDataTables')->name('admin.perfume.author.index.authorDataTables');
        Route::post('/nuoc-hoa/nha-pha-che', 'Backend\Tables\AuthorController@store')->name('admin.perfume.author.store');
        Route::get('/nuoc-hoa/nha-pha-che/{id}', 'Backend\Tables\AuthorController@show')->name('admin.perfume.author.detail');
        Route::post('/nuoc-hoa/nha-pha-che/sua', 'Backend\Tables\AuthorController@update')->name('admin.perfume.author.update');
        Route::get('/nuoc-hoa/nha-pha-che/xoa/{id_author}', 'Backend\Tables\AuthorController@delete')->name('admin.perfume.author.delete');

        Route::get('/nuoc-hoa/loai-nuoc-hoa', 'Backend\Tables\TypePerfumeController@index')->name('admin.perfume.typeperfume.index');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/loading_typeperfume', 'Backend\Tables\TypePerfumeController@typePerfumeDataTables')->name('admin.perfume.typeperfume.index.typePerfumeDataTables');
        Route::post('/nuoc-hoa/loai-nuoc-hoa', 'Backend\Tables\TypePerfumeController@store')->name('admin.perfume.typeperfume.store');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/{id}', 'Backend\Tables\TypePerfumeController@show')->name('admin.perfume.typeperfume.detail');
        Route::post('/nuoc-hoa/loai-nuoc-hoa/sua', 'Backend\Tables\TypePerfumeController@update')->name('admin.perfume.typeperfume.update');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/xoa/{id_type_perfume}', 'Backend\Tables\TypePerfumeController@delete')->name('admin.perfume.typeperfume.delete');
    });
});



