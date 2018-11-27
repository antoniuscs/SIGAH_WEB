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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/fasilitasutama', function () {
    return view('fasilitasutama');
});

Route::get('/kamarutama', function () {
    return view('kamarutama');
});

Route::get('/reservasi', function () {
    return view('reservasi');
});

Route::get('/kebijakan', function () {
    return view('kebijakan');
});

Route::get('/reservasi-user',function(){
  return view('reservasi-user.reservasi');
});

Route::post('/reservasi-user-do','ReservasiController@reservasiuser')->name('reservasiuser');

Route::post('/doregister','AuthController@register')->name('register');
Route::post('/editdata','AuthController@editdata')->name('editdata');

//Auth::routes();

Route::post('/dologin','AuthController@dologin')->name('dologin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/dashboard','DashboardController@create')->name('dashboard.create')->middleware('notauth');


Route::get('/tempattidur','TempatTidurController@index')->name('tempatTidur.index')->middleware('notauth');
Route::get('/tempattidur/create','TempatTidurController@create')->name('tempatTidur.create')->middleware('notauth');
Route::post('/tempattidur/create','TempatTidurController@store')->name('tempatTidur.store')->middleware('notauth');
Route::get('/tempattidur/{tempattidurs}/edit', 'TempatTidurController@edit')->name('tempatTidur.edit')->middleware('notauth');
Route::patch('/tempattidur/{tempattidurs}/edit', 'TempatTidurController@update')->name('tempatTidur.update')->middleware('notauth');
Route::delete('tempattidur/{tempattidurs}/delete','TempatTidurController@destroy')->name('tempatTidur.destroy')->middleware('notauth');

Route::get('/jeniskamar','JenisKamarController@index')->name('jenisKamar.index')->middleware('notauth');
Route::get('/jeniskamar/create','JenisKamarController@create')->name('jenisKamar.create')->middleware('notauth');
Route::post('/jeniskamar/create','JenisKamarController@store')->name('jenisKamar.store')->middleware('notauth');
Route::get('/jeniskamar/{jeniskamars}/edit', 'JenisKamarController@edit')->name('jenisKamar.edit')->middleware('notauth');
Route::patch('/jeniskamar/{jeniskamars}/edit', 'JenisKamarController@update')->name('jenisKamar.update')->middleware('notauth');
Route::delete('jeniskamar/{jeniskamars}/delete','JenisKamarController@destroy')->name('jenisKamar.destroy')->middleware('notauth');

Route::get('/kamar','KamarController@index')->name('kamar.index')->middleware('notauth');
Route::get('/kamar/create','KamarController@create')->name('kamar.create')->middleware('notauth');
Route::post('/kamar/create','KamarController@store')->name('kamar.store')->middleware('notauth');
Route::get('/kamar/{kamars}/edit', 'KamarController@edit')->name('kamar.edit')->middleware('notauth');
Route::patch('/kamar/{kamars}/edit', 'KamarController@update')->name('kamar.update')->middleware('notauth');
Route::delete('kamar/{kamars}/delete','KamarController@destroy')->name('kamar.destroy')->middleware('notauth');

Route::get('/reservasi','ReservasiController@index')->name('reservasi.index')->middleware('notauth');
Route::get('/reservasi/create','ReservasiController@create')->name('reservasi.create')->middleware('notauth');
Route::post('/reservasi/create','ReservasiController@store')->name('reservasi.store')->middleware('notauth');
Route::get('/reservasi/{reservasis}/edit', 'ReservasiController@edit')->name('reservasi.edit')->middleware('notauth');
Route::patch('/reservasi/{reservasis}/edit', 'ReservasiController@update')->name('reservasi.update')->middleware('notauth');
Route::delete('reservasi/{reservasis}/delete','ReservasiController@destroy')->name('reservasi.destroy')->middleware('notauth');
Route::patch('/reservasi/{reservasis}/batal','ReservasiController@updateStatus')->name('reservasi.updateStatus')->middleware('notauth');
Route::patch('/reservasi/{reservasis}/checkin','ReservasiController@updateCheckIn')->name('reservasi.updateCheckIn')->middleware('notauth');
Route::patch('/reservasi/{reservasis}/checkout','ReservasiController@updateCheckOut')->name('reservasi.updateCheckOut')->middleware('notauth');

Route::get('/reservasi/detail','DetailReservasiController@index')->name('reservasi.detail')->middleware('notauth');

Route::get('/transaksi','TransaksiController@index')->name('transaksi.index')->middleware('notauth');
Route::get('/transaksi/create','TransaksiController@create')->name('transaksi.create')->middleware('notauth');
Route::post('/transaksi/create','TransaksiController@store')->name('transaksi.store')->middleware('notauth');
Route::get('/transaksi/{transaksis}/edit', 'TransaksiController@edit')->name('transaksi.edit')->middleware('notauth');
Route::patch('/transaksi/{transaksis}/edit', 'TransaksiController@update')->name('transaksi.update')->middleware('notauth');
Route::delete('transaksi/{transaksis}/delete','TransaksiController@destroy')->name('transaksi.destroy')->middleware('notauth');

Route::get('/season','SeasonController@index')->name('season.index')->middleware('notauth');
Route::get('/season/create','SeasonController@create')->name('season.create')->middleware('notauth');
Route::post('/season/create','SeasonController@store')->name('season.store')->middleware('notauth');
Route::get('/season/{seasons}/edit', 'SeasonController@edit')->name('season.edit')->middleware('notauth');
Route::patch('/season/{seasons}/edit', 'SeasonController@update')->name('season.update')->middleware('notauth');
Route::delete('season/{seasons}/delete','SeasonController@destroy')->name('season.destroy')->middleware('notauth');

Route::get('/fasilitas','FasilitasController@index')->name('fasilitas.index')->middleware('notauth');
Route::get('/fasilitas/create','FasilitasController@create')->name('fasilitas.create')->middleware('notauth');
Route::post('/fasilitas/create','FasilitasController@store')->name('fasilitas.store')->middleware('notauth');
Route::get('/fasilitas/{fasilitas}/edit', 'FasilitasController@edit')->name('fasilitas.edit')->middleware('notauth');
Route::patch('/fasilitas/{fasilitas}/edit', 'FasilitasController@update')->name('fasilitas.update')->middleware('notauth');
Route::delete('fasilitas/{fasilitas}/delete','FasilitasController@destroy')->name('fasilitas.destroy')->middleware('notauth');

Route::get('/staff','StaffController@index')->name('staff.index')->middleware('notauth');
Route::get('/staff/create','StaffController@create')->name('staff.create')->middleware('notauth');
Route::post('/staff/create','StaffController@store')->name('staff.store')->middleware('notauth');
Route::get('/staff/{staf}/edit', 'StaffController@edit')->name('staff.edit')->middleware('notauth');
Route::patch('/staff/{staf}/edit', 'StaffController@update')->name('staff.update')->middleware('notauth');
Route::delete('staff/{staf}/delete','StaffController@destroy')->name('staff.destroy')->middleware('notauth');

Route::get('/customer','CustomerController@index')->name('customer.index')->middleware('notauth');
Route::get('/customer/create','CustomerController@create')->name('customer.create')->middleware('notauth');
Route::post('/customer/create','CustomerController@store')->name('customer.store')->middleware('notauth');
Route::get('/customer/{customers}/edit', 'CustomerController@edit')->name('customer.edit')->middleware('notauth');
Route::patch('/customer/{customers}/edit', 'CustomerController@update')->name('customer.update')->middleware('notauth');
Route::delete('customer/{customers}/delete','CustomerController@destroy')->name('customer.destroy')->middleware('notauth');

Route::get('/lpjeniscustomerperbulantiapcabang',function(){
  return view('laporan.perjeniscustomer');
})->name('lpjc')->middleware('notauth');

Route::get('pertahuncabang',function(){
  return view('laporan.pertahuncabang');
})->name('ptc')->middleware('notauth');

Route::get('lpjtkc',function(){
  return view('laporan.jumlahtamukamarcabang');
})->name('lpjtkc')->middleware('notauth');

Route::get('lpjcc',function(){
  return view('laporan.perjeniscustomer');
})->name('lpjcc')->middleware('notauth');

Route::get('ptc-data/{year}','LokasiController@ptcdata')->name('ptc-data')->middleware('notauth');
Route::get('jtkc-data/{year}','LokasiController@jtkcdata')->name('jtkc-data')->middleware('notauth');
Route::get('jcc-data/{year}','LokasiController@jccdata')->name('ptc-data')->middleware('notauth');
