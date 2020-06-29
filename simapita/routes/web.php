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


Route::get('/dashboard', 'AdminController@dashboard');

// promosi
Route::get('/promosi', 'PromosiController@index');
Route::get('/promosi/export_excel', 'PromosiController@export_excel');

// Route::get('/wisata', function () {
//     return view('daftar_wisata');
// });

Route::get('/dashboard', 'AdminController@dashboard');

Route::get('/wisata', 'AdminController@wisata');

Route::get('/daftar_wisata', 'WisataController@tampilan_data');
Route::get('/daftar_wisata/tambah', 'WisataController@tambah');
Route::post('/daftar_wisata/store','WisataController@store');
Route::get('/daftar_wisata/edit/{id}','WisataController@edit');
Route::post('/daftar_wisata/update','WisataController@update');
Route::get('/daftar_wisata/hapus/{id}','WisataController@hapus');
