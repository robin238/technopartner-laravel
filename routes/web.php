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


Route::get('/', 'TransaksiController@home');
Route::get('/kategori', 'KategoriController@index');
Route::get('/inputkategori', 'KategoriController@create');
Route::post('/inputkategori', 'KategoriController@store');
Route::get('/kategori/{kategori}', 'KategoriController@edit');
Route::put('/updatekategori/{kategori}', 'KategoriController@update');
Route::delete('/kategori/hapus/{kategori}', 'KategoriController@destroy');

Route::get('/list', 'TransaksiController@list');
Route::post('/sort', 'TransaksiController@sort');
Route::get('/transaksi', 'TransaksiController@index');
Route::get('/inputtransaksi', 'TransaksiController@create');
Route::post('/inputtransaksi', 'TransaksiController@store');
Route::get('/transaksi/{transaksi}', 'TransaksiController@edit');
Route::put('/updatetransaksi/{transaksi}', 'TransaksiController@update');
Route::delete('/transaksi/hapus/{transaksi}', 'TransaksiController@destroy');
Route::get('/getpemasukan', 'TransaksiController@getpemasukan');
Route::get('/getpengeluaran', 'TransaksiController@getpengeluaran');

