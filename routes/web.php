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

    Auth::routes();
    Route::prefix('')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::post('home', 'HomeController@home')->name('nav.home');
        Route::get('contact', 'ContactController@index')->name('nav.contact');
        Route::get('nuoc-hoa/moi-ve', 'PerfumeController@hot')->name('nav.perfume.detail');
        Route::get('nuoc-hoa', 'PerfumeController@index')->name('nav.perfume');

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
    });

    Route::prefix('quan-tri')->group(function () {
        Route::get('/', 'Backend\AdminHomeController@index')->name('admin.dashboard');

        Route::get('/dang-nhap', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/dang-nhap', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
        Route::get('/dang-xuat', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

        /**
         * PROFILE ROUTE
         */
        Route::get('/tai-khoan', 'Backend\AdminProfileController@show')->name('admin.profile');
        Route::get('/thanh-toan', 'Backend\AdminInvoiceController@index')->name('admin.invoice');

        /**
         * ADMIN ROUTE
         */
        Route::get('/cap-cao', 'Backend\Manager\Super\SuperController@index')->name('admin.super.index');
        Route::get('/cap-cao/loading_super', 'Backend\Manager\Super\SuperController@superDataTables')->name('admin.super.superDataTables');
        Route::post('/cap-cao', 'Backend\Manager\Super\SuperController@store')->name('admin.super.store');
        Route::get('/cap-cao/xoa/{id}', 'Backend\Manager\Super\SuperController@delete')->name('admin.super.delete');
        Route::get('/cap-cao/chi-tiet/{id}', 'Backend\Manager\Super\SuperController@show')->name('admin.super.detail');
        Route::post('/cap-cao/sua', 'Backend\Manager\Super\SuperController@update')->name('admin.super.update');

        /**
         * PERFUME ROUTE
         */
        Route::get('/nuoc-hoa', 'Backend\AdminPerfumeController@index')->name('admin.perfume.index');
        Route::get('/nuoc-hoa/loading_perfume', 'Backend\AdminPerfumeController@perfumeDataTables')->name('admin.perfume.index.perfumeDataTables');
        Route::get('/nuoc-hoa/them', 'Backend\AdminPerfumeController@create')->name('admin.perfume.create');
        Route::post('/nuoc-hoa', 'Backend\AdminPerfumeController@store')->name('admin.perfume.store');
        Route::get('/nuoc-hoa/detail/{id}', 'Backend\AdminPerfumeController@show')->name('admin.perfume.detail');
        Route::post('/nuoc-hoa/sua', 'Backend\AdminPerfumeController@update')->name('admin.perfume.update');
        Route::get('/nuoc-hoa/xoa/{id}', 'Backend\AdminPerfumeController@delete')->name('admin.perfume.delete');

        /**
         * MORE ROUTE
         */
        Route::post('/nuoc-hoa/nong-do/all', 'Backend\Tables\ConcentrationController@indexAll')->name('admin.perfume.concentration.indexAll');
        Route::post('/nuoc-hoa/nhom-huong/all', 'Backend\Tables\IncenseController@indexAll')->name('admin.perfume.incense.indexAll');
        Route::post('/nuoc-hoa/phong-cach/all', 'Backend\Tables\StyleController@indexAll')->name('admin.perfume.style.indexAll');
        Route::post('/nuoc-hoa/nha-pha-che/all', 'Backend\Tables\AuthorController@indexAll')->name('admin.perfume.author.indexAll');
        Route::post('/nuoc-hoa/loai-nuoc-hoa/all', 'Backend\Tables\TypePerfumeController@indexAll')->name('admin.perfume.typeperfume.indexAll');
        Route::get('/giao-dien/slide-anh', 'Gui\ImageSlider\ImageSliderController@index')->name('admin.gui.index');

        /**
         * CONCENTRATION ROUTE
         */
        Route::get('/nuoc-hoa/nong-do', 'Backend\Tables\ConcentrationController@index')->name('admin.perfume.concentration.index');
        Route::get('/nuoc-hoa/nong-do/loading_concentration', 'Backend\Tables\ConcentrationController@concentrationDataTables')->name('admin.perfume.concentration.index.concentrationDataTables');
        Route::post('/nuoc-hoa/nong-do', 'Backend\Tables\ConcentrationController@store')->name('admin.perfume.concentration.store');
        Route::get('/nuoc-hoa/nong-do/{id}', 'Backend\Tables\ConcentrationController@show')->name('admin.perfume.concentration.detail');
        Route::post('/nuoc-hoa/nong-do/sua', 'Backend\Tables\ConcentrationController@update')->name('admin.perfume.concentration.update');
        Route::get('/nuoc-hoa/nong-do/xoa/{id}', 'Backend\Tables\ConcentrationController@delete')->name('admin.perfume.concentration.delete');

        /**
         * INCENSE ROUTE
         */
        Route::get('/nuoc-hoa/nhom-huong', 'Backend\Tables\IncenseController@index')->name('admin.perfume.incense.index');
        Route::get('/nuoc-hoa/nhom-huong/loading_incense', 'Backend\Tables\IncenseController@incenseDataTables')->name('admin.perfume.incense.index.incenseDataTables');
        Route::post('/nuoc-hoa/nhom-huong', 'Backend\Tables\IncenseController@store')->name('admin.perfume.incense.store');
        Route::get('/nuoc-hoa/nhom-huong/{id}', 'Backend\Tables\IncenseController@show')->name('admin.perfume.incense.detail');
        Route::post('/nuoc-hoa/nhom-huong/sua', 'Backend\Tables\IncenseController@update')->name('admin.perfume.incense.update');
        Route::get('/nuoc-hoa/nhom-huong/xoa/{id_incense}', 'Backend\Tables\IncenseController@delete')->name('admin.perfume.incense.delete');

        /**
         * STYLE ROUTE
         */
        Route::get('/nuoc-hoa/phong-cach', 'Backend\Tables\StyleController@index')->name('admin.perfume.style.index');
        Route::get('/nuoc-hoa/phong-cach/loading_style', 'Backend\Tables\StyleController@styleDataTables')->name('admin.perfume.style.index.styleDataTables');
        Route::post('/nuoc-hoa/phong-cach', 'Backend\Tables\StyleController@store')->name('admin.perfume.style.store');
        Route::get('/nuoc-hoa/phong-cach/{id}', 'Backend\Tables\StyleController@show')->name('admin.perfume.style.detail');
        Route::post('/nuoc-hoa/phong-cach/sua', 'Backend\Tables\StyleController@update')->name('admin.perfume.style.update');
        Route::get('/nuoc-hoa/phong-cach/xoa/{id_style}', 'Backend\Tables\StyleController@delete')->name('admin.perfume.style.delete');

        /**
         * AUTHOR ROUTE
         */
        Route::get('/nuoc-hoa/nha-pha-che', 'Backend\Tables\AuthorController@index')->name('admin.perfume.author.index');
        Route::get('/nuoc-hoa/nha-pha-che/loading_author', 'Backend\Tables\AuthorController@authorDataTables')->name('admin.perfume.author.index.authorDataTables');
        Route::post('/nuoc-hoa/nha-pha-che', 'Backend\Tables\AuthorController@store')->name('admin.perfume.author.store');
        Route::get('/nuoc-hoa/nha-pha-che/{id}', 'Backend\Tables\AuthorController@show')->name('admin.perfume.author.detail');
        Route::post('/nuoc-hoa/nha-pha-che/sua', 'Backend\Tables\AuthorController@update')->name('admin.perfume.author.update');
        Route::get('/nuoc-hoa/nha-pha-che/xoa/{id_author}', 'Backend\Tables\AuthorController@delete')->name('admin.perfume.author.delete');

        /**
         * TYPE PERFUME ROUTE
         */
        Route::get('/nuoc-hoa/loai-nuoc-hoa', 'Backend\Tables\TypePerfumeController@index')->name('admin.perfume.typeperfume.index');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/loading_typeperfume', 'Backend\Tables\TypePerfumeController@typePerfumeDataTables')->name('admin.perfume.typeperfume.index.typePerfumeDataTables');
        Route::post('/nuoc-hoa/loai-nuoc-hoa', 'Backend\Tables\TypePerfumeController@store')->name('admin.perfume.typeperfume.store');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/{id}', 'Backend\Tables\TypePerfumeController@show')->name('admin.perfume.typeperfume.detail');
        Route::post('/nuoc-hoa/loai-nuoc-hoa/sua', 'Backend\Tables\TypePerfumeController@update')->name('admin.perfume.typeperfume.update');
        Route::get('/nuoc-hoa/loai-nuoc-hoa/xoa/{id_type_perfume}', 'Backend\Tables\TypePerfumeController@delete')->name('admin.perfume.typeperfume.delete');
    });
});



