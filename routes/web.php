<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeSiswaController@index')->name('beranda');

 //login siswa
Route::get('loginsiswa', 'LoginController@showFormLoginSiswa')->name('loginsiswa');
Route::get('loginsiswa', 'LoginController@showFormLoginSiswa')->name('loginsiswa');
Route::post('loginsiswa', 'LoginController@loginsiswa');

//registrasi siswa
Route::get('registersiswa', 'LoginController@showFormRegisterSiswa')->name('registersiswa');
Route::post('aregistersiswa', 'LoginController@registersiswa')->name('aregistersiswa');
Route::post('getsekolah', 'LoginController@getSekolah')->name('getsekolah');

//registrasi admin
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');

Route::get('candy', 'AuthController@showFormRegister')->name('register');
Route::post('candy', 'AuthController@register');

//group
Route::group(['middleware' => 'auth:user,siswa'], function () {

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('homesiswa', 'HomeSiswaController@home')->name('homesiswa');
});

Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('keluar', 'LoginController@keluar')->name('keluar');

//admin
Route::get('akunadmin', 'AdminController@show')->name('akunadmin');
Route::get('data_siswa', 'SiswaController@index')->name('data_siswa');
Route::get('data_admin', 'AdminController@index')->name('data_admin');
Route::get('laporan_admin', 'LaporanController@index')->name('laporan_admin');

Route::resource('kelola_admin', 'AdminController');
Route::resource('kelola_siswa', 'SiswaController');

Route::resource('kelola_laporan', 'LaporanController');
Route::get('hapusadmin/{id}','AdminController@destroy')->name('hapusadmin');
Route::get('hapussiswa/{id}','SiswaController@destroy')->name('hapussiswa');
Route::get('hapusomset/{id}','HalOmsetController@destroy')->name('hapusomset');
Route::get('hapususaha/{id}','HalUsahaController@destroy')->name('hapususaha');


//siswa
Route::get('halsiswa', 'HalSiswaController@index')->name('homesiswa');
Route::get('d_siswa', 'HalSiswaController@home')->name('d_siswa');
Route::get('akun', 'HalSiswaController@akun')->name('akun');

Route::get('halusaha', 'HalUsahaController@index')->name('homeusaha');

Route::resource('usaha', 'HalUsahaController');

Route::get('halomset', 'HalOmsetController@index')->name('homeomset');

Route::resource('omset', 'HalOmsetController');

Route::get('hallaporan', 'HalLaporanController@index')->name('homelaporan');

Route::post('hall', 'HalLaporanController@show');
Route::get('cetak_omsetsiswa', 'HalLaporanController@cetak_pdf');

Route::get('cetak_laporan', 'LaporanController@cetak_pdf');
Route::get('cetak_excel', 'LaporanController@export_excel');

Route::get('ubah_halsiswa/{id}','HalSiswaController@edit')->name('ubah_halsiswa');

Route::get('ubah_sandi/{id}','HalSiswaController@editakun')->name('ubah_sandi');

Route::get('ubah_akun/{id}','AdminController@editakun')->name('ubah_akun');

Route::get('ubah_usaha/{id}','HalUsahaController@edit')->name('ubah_usaha');

Route::get('ubah_omset/{id}','HalOmsetController@edit')->name('ubah_omset');

Route::post('/hsiswa/{id}','HalSiswaController@update');

Route::post('/aksiubah_sandi/{id}','HalSiswaController@updatesandi');
Route::post('/aksiubah_usaha/{id}','HalUsahaController@update');
Route::post('/aksiubah_omset/{id}','HalOmsetController@update');
Route::post('/aksiubah_akun/{id}','AdminController@updateakun');