<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/register', 'Admin\RegisterController@register');
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});

// Socialite login
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::prefix('ez')->group(function () {
    Route::get('/', 'EzController@index');
    Route::get('/member/{user}/edit', 'EditController@showEditForm');
    Route::put('/member/{user}', 'EditController@update');
    Route::post('/contact', 'EzController@contact');
    Route::get('/{location}/location', 'EzController@location');
    Route::get('/tour', 'EzController@showtour');
    Route::get('/tour/{tour}/detail', 'EzController@showtourdetail');
    Route::get('/tour/{tour}/form', 'EzController@showTourForm');

    Route::get('/tour/review', 'EzController@showReviewTourForm');
    Route::get('/tour/payment', function () {
        return view('ez/tour/payment');
    });
    Route::get('/tour/process', function () {
        return view('ez/tour/proses');
    });
    Route::get('/tour/e-ticket', function () {
        return view('ez/tour/report');
    });

    Route::get('/travel', function () {
        return view('ez/travel/result');
    });
});
