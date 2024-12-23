<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //
    Route::get('beranda', 'BerandaController@index');

    // master paket-laundry
    Route::get('paket-laundry', 'PaketController@index');
    Route::get('paket-laundry/add', 'PaketController@add');
    Route::post('paket-laundry/add', 'PaketController@stores');
    Route::get('paket-laundry/{id}', 'PaketController@edit');
    Route::put('paket-laundry/{id}', 'PaketController@update');
    Route::delete('paket-laundry/{id}','PaketController@destroy');

    // customer
    Route::get('customer', 'CustomerController@index');
    Route::get('customer/add', 'CustomerController@create');
    Route::post('customer/add', 'CustomerController@store');
    Route::get('customer/{id}', 'CustomerController@edit');
    Route::put('customer/{id}', 'CustomerController@update');
    Route::delete('customer/{id}', 'CustomerController@destroy');

    // master status-pesanan
    Route::get('status-pesanan', 'StatusPesananController@index');
    Route::get('status-pesanan/add', 'StatusPesananController@create');
    Route::post('status-pesanan/add', 'StatusPesananController@store');
    Route::get('status-pesanan/{id}', 'StatusPesananController@edit');
    Route::put('status-pesanan/{id}', 'StatusPesananController@update');
    Route::delete('status-pesanan/{id}', 'StatusPesananController@destroy');

    // master status-pembayaran
    Route::get('status-pembayaran', 'StatuspembayaranController@index');
    Route::get('status-pembayaran/add', 'StatuspembayaranController@create');
    Route::post('status-pembayaran/add', 'StatuspembayaranController@store');
    Route::get('status-pembayaran/{id}', 'StatuspembayaranController@edit');
    Route::put('status-pembayaran/{id}', 'StatuspembayaranController@update');
    Route::delete('status-pembayaran/{id}', 'StatuspembayaranController@destroy');

    // master transaksi-pesanan
    Route::get('transaksi-pesanan', 'TpesananController@index');
    Route::get('transaksi-pesanan/periode', 'TpesananController@periode');
    Route::get('transaksi-pesanan/add', 'TpesananController@create');
    Route::post('transaksi-pesanan/add', 'TpesananController@store');
    Route::get('transaksi-pesanan/{id}', 'TpesananController@edit');
    Route::put('transaksi-pesanan/{id}', 'TpesananController@update');
    Route::delete('transaksi-pesanan/{id}', 'TpesananController@destroy');
    Route::get('transaksi-pesanan/naikkan-status/{id}', 'TpesananController@naikkanstatus');
    Route::get('transaksi-pesanan/naikkan-status-pembayaran/{id}', 'TpesananController@naikkanstatuspembayaran');
    Route::get('transaksi-pesanan/print/{id}','TpesananController@export');

    // master nama-usaha
    Route::get('nama-usaha','ProfileController@index');
    Route::put('nama-usaha','ProfileController@update');

    // master nama-usaha
    Route::get('karyawan','KaryawanController@index');
    Route::get('karyawan/add','KaryawanController@create');
    Route::post('karyawan/add','KaryawanController@store');
    Route::get('karyawan/{id}','KaryawanController@edit');
    Route::put('karyawan/{id}','KaryawanController@update');
    Route::delete('karyawan/{id}','KaryawanController@destroy');
});

Route::get('/home', function(){
	return redirect('beranda');
});

Route::get('keluar', function() {
    //
    \Auth::logout();
    return redirect('login');
});
