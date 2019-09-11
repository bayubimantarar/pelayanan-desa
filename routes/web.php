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

Route::group(['prefix' => 'autentikasi'], function(){
    Route::get('/form-login', [
        'uses' => 'Autentikasi\AutentikasiController@loginForm',
        'as' => 'autentikasi.loginForm'
    ]);
    Route::post('/login', [
        'uses' => 'Autentikasi\AutentikasiController@login',
        'as' => 'autentikasi.login'
    ]);
    Route::post('/logout', [
        'uses' => 'Autentikasi\AutentikasiController@logout',
        'as' => 'autentikasi.logout'
    ]);
});

Route::group(['middleware' => 'auth:pengguna'], function(){
    Route::get('/', function(){
        return view('dasbor');
    });
});
