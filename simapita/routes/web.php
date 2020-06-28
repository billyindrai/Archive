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

<<<<<<< HEAD
Route::get('/dashboard', 'AdminController@dashboard');

// promosi
Route::get('/promosi', 'PromosiController@index');
Route::get('/promosi/export_excel', 'PromosiController@export_excel');
=======
// Route::get('/wisata', function () {
//     return view('daftar_wisata');
// });

Route::get('/dashboard', 'AdminController@dashboard');

Route::get('/wisata', 'AdminController@wisata');
>>>>>>> 33eebf5d52a37ec9fd0c1bc71c2285c5df120b71
