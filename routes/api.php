<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', 'ApiUser@index');
Route::get('users2', 'ApiUser@select');
Route::post('adduser', 'ApiUser@create');
Route::post('cek', 'ApiUser@CekLogin');
Route::post('provinsi', 'ApiUser@provinsi');
Route::post('edit', 'ApiUser@profilEdit');
Route::post('inputFoto', 'ApiUser@Foto');
Route::post('liat', 'ApiUser@selectAll');
Route::delete('/user/{id}', 'ApiUser@delete');
