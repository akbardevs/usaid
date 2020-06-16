<?php

use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware' => 'auth'], function () {

    //User Route
    Route::resource('/user', 'UsersController');
    Route::get('/user/{id}/edit/','UsersController@edit');
    Route::post('/user/gPassword','UsersController@gPassword')->name('user.gPassword');
    Route::post('/user/update','UsersController@update')->name('user.update');
   
    //Dashboard Route
    Route::resource('/', 'HomeController');
    Route::get('/pendonorchart','HomeController@pendonorchart');
    Route::get('/donorchart','HomeController@donorchart');

    //Pendonor Route
    Route::resource('/pendonor', 'PendonorController');
    Route::get('/pendonor/{id}/edit/','PendonorController@edit');
    Route::post('/pendonor/update','PendonorController@update')->name('pendonor.update');
    Route::get('/pendonor/drop','PendonorController@drop');

    //Donor Route
    Route::resource('/donor', 'DonorController');
    Route::get('/donor/{id}/edit/','DonorController@edit');
    Route::post('/donor/update','DonorController@update')->name('donor.update');

    //Penggunaan Route
    Route::resource('/penggunaan', 'PenggunaanController');
    Route::get('/penggunaan/{id}/edit/','PenggunaanController@edit');
    Route::post('/penggunaan/update','PenggunaanController@update')->name('penggunaan.update');

     //Berita Route
    Route::resource('/berita', 'BeritaController');
    Route::get('/berita/{id}/edit/','BeritaController@edit');
    Route::post('/berita/update','BeritaController@update')->name('berita.update');
    Route::post('/berita/gambar','BeritaController@gambar')->name('berita.gambar');
   
     Route::resource('/notif', 'notifController');


});
Auth::routes();


