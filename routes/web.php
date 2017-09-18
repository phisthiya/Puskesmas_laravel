<?php

Route::get('/', function () {
    return view('puskesmas/home');
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

Route::prefix('puskesmas')->group(function () {
    Route::get('/', 'PuskesmasController@index');
});
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//dokter
Route::prefix('admin')->group(function () {
    Route::get('/dokter', 'AdminController@showDokter')->name('admin.dokter');
    Route::get('/dokter/edit-{dokter}', 'AdminController@showEditDokterForm');
    Route::put('/dokter-{dokter}/update', 'AdminController@updateDokter');
    Route::get('/dokter/delete-{dokter}', 'AdminController@deleteDokter');
    Route::get('/dokter/createdokter}', 'AdminController@createDokter');
    Route::post('/dokter/createdokter', 'AdminController@storeDokter');
});
//karyawan
Route::prefix('admin')->group(function () {
    Route::get('/karyawan', 'AdminController@showKaryawan')->name('admin.karyawan');
    Route::get('/karyawan/edit-{pegawai}', 'AdminController@showEditKaryawanForm');
    Route::put('/karyawan-{pegawai}/update', 'AdminController@updateKaryawan');
    Route::get('/karyawan/delete-{pegawai}', 'AdminController@deleteKaryawan');
    Route::get('/karyawan/create-{karyawan}', 'AdminController@createKaryawan');
    Route::post('/karyawan/{karyawan}/store', 'AdminController@storeKaryawan');
});
//obat
Route::get('/admin/edit-{id}', 'AdminController@editobat');
Route::put('/admin/{id}', 'AdminController@updateobat');
Route::get('/admin/c_obat', 'AdminController@create');
Route::post('/admin/c_obat', 'AdminController@store');
Route::get('/admin/{id}', 'AdminController@delobat');
Route::get('/obat', 'AdminController@showObat')->name('admin.obat');

//poli umum
Route::get('/umum', 'AdminController@showUmum')->name('admin.umum');
Route::get('/umum/edit-{t_a_ns}', 'AdminController@showEditUmumForm');
Route::put('/umum-{t_a_ns}/update', 'AdminController@updateUmum');


Route::prefix('admin')->group(function () {

    Route::get('/umum/delete-{t_a_ns}', 'AdminController@deleteUmum');
});
//poli gigi
Route::prefix('admin')->group(function () {
    Route::get('/gigi', 'AdminController@showGigi')->name('admin.gigi');
});
//poli kia
Route::prefix('admin')->group(function () {
    Route::get('/kia', 'AdminController@showKia')->name('admin.kia');
});
//poli lansia
Route::prefix('admin')->group(function () {
    Route::get('/lansia', 'AdminController@showLansia')->name('admin.lansia');
});
//rawat inap
Route::prefix('admin')->group(function () {
    Route::get('/inap', 'AdminController@showInap')->name('admin.inap');
});
//rawat jalan
Route::prefix('admin')->group(function () {
    Route::get('/jalan', 'AdminController@showJalan')->name('admin.jalan');
});
//rujukan
Route::prefix('admin')->group(function () {
    Route::get('/rujukan', 'AdminController@showRujukan')->name('admin.rujukan');
});



