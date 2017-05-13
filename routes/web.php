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

Route::prefix('ez')->group(function () {
    Route::get('/', 'EzController@index');
    Route::get('/member/{user}/edit', 'EzController@edit');
    Route::put('/member/{user}', 'EzController@update');
    Route::post('/contact', 'EzController@contact');
    Route::get('/tour', 'EzController@showtour');
    Route::get('/tour/{tour}/detail', 'EzController@showtourdetail');
    Route::get('/tour/{tour}/form', 'EzController@tourform');

    Route::get('/tour/{tour}/confirm', function () {
        return view('ez/confirm');
    });
    Route::get('/tour/confirm', 'EzController@tourconfirm');
    Route::get('/tour/{tour}/report', 'EzController@tourreport');
});