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
    Route::group(['prefix' => 'master'], function(){
        Route::group(['prefix' => 'penduduk'], function(){
            Route::get('/', [
                'uses' => 'Master\PendudukController@index',
                'as' => 'master.penduduk.index'
            ]);
            Route::get('/data', [
                'uses' => 'Master\PendudukController@data',
                'as' => 'master.penduduk.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Master\PendudukController@create',
                'as' => 'master.penduduk.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Master\PendudukController@edit',
                'as' => 'master.penduduk.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Master\PendudukController@store',
                'as' => 'master.penduduk.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Master\PendudukController@update',
                'as' => 'master.penduduk.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Master\PendudukController@destroy',
                'as' => 'master.penduduk.destroy'
            ]);
        });
    });
});
