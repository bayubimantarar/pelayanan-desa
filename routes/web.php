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
    Route::group(['prefix' => 'profil'], function(){
        Route::group(['prefix' => 'pemerintahan'], function(){
            Route::get('/', [
                'uses' => 'Profil\PemerintahanController@index',
                'as' => 'profil.pemerintahan.index'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Profil\PemerintahanController@update',
                'as' => 'profil.pemerintahan.update'
            ]);
        });
        Route::group(['prefix' => 'perangkat'], function(){
            Route::get('/', [
                'uses' => 'Profil\PerangkatController@index',
                'as' => 'profil.perangkat.index'
            ]);
            Route::get('/data', [
                'uses' => 'Profil\PerangkatController@data',
                'as' => 'profil.perangkat.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Profil\PerangkatController@create',
                'as' => 'profil.perangkat.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Profil\PerangkatController@edit',
                'as' => 'profil.perangkat.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Profil\PerangkatController@store',
                'as' => 'profil.perangkat.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Profil\PerangkatController@update',
                'as' => 'profil.perangkat.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Profil\PerangkatController@destroy',
                'as' => 'profil.perangkat.destroy'
            ]);
        });
    });
    Route::group(['prefix' => 'master'], function(){
        Route::group(['prefix' => 'agama'], function(){
            Route::get('/', [
                'uses' => 'Master\AgamaController@index',
                'as' => 'master.agama.index'
            ]);
            Route::get('/data', [
                'uses' => 'Master\AgamaController@data',
                'as' => 'master.agama.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Master\AgamaController@create',
                'as' => 'master.agama.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Master\AgamaController@edit',
                'as' => 'master.agama.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Master\AgamaController@store',
                'as' => 'master.agama.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Master\AgamaController@update',
                'as' => 'master.agama.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Master\AgamaController@destroy',
                'as' => 'master.agama.destroy'
            ]);
        });
        Route::group(['prefix' => 'pendidikan'], function(){
            Route::get('/', [
                'uses' => 'Master\PendidikanController@index',
                'as' => 'master.pendidikan.index'
            ]);
            Route::get('/data', [
                'uses' => 'Master\PendidikanController@data',
                'as' => 'master.pendidikan.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Master\PendidikanController@create',
                'as' => 'master.pendidikan.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Master\PendidikanController@edit',
                'as' => 'master.pendidikan.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Master\PendidikanController@store',
                'as' => 'master.pendidikan.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Master\PendidikanController@update',
                'as' => 'master.pendidikan.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Master\PendidikanController@destroy',
                'as' => 'master.pendidikan.destroy'
            ]);
        });
        Route::group(['prefix' => 'jenis-kelamin'], function(){
            Route::get('/', [
                'uses' => 'Master\JenisKelaminController@index',
                'as' => 'master.jenis_kelamin.index'
            ]);
            Route::get('/data', [
                'uses' => 'Master\JenisKelaminController@data',
                'as' => 'master.jenis_kelamin.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Master\JenisKelaminController@create',
                'as' => 'master.jenis_kelamin.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Master\JenisKelaminController@edit',
                'as' => 'master.jenis_kelamin.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Master\JenisKelaminController@store',
                'as' => 'master.jenis_kelamin.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Master\JenisKelaminController@update',
                'as' => 'master.jenis_kelamin.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Master\JenisKelaminController@destroy',
                'as' => 'master.jenis_kelamin.destroy'
            ]);
        });
        Route::group(['prefix' => 'status-perkawinan'], function(){
            Route::get('/', [
                'uses' => 'Master\StatusPerkawinanController@index',
                'as' => 'master.status_perkawinan.index'
            ]);
            Route::get('/data', [
                'uses' => 'Master\StatusPerkawinanController@data',
                'as' => 'master.status_perkawinan.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'Master\StatusPerkawinanController@create',
                'as' => 'master.status_perkawinan.create'
            ]);
            Route::get('/form-ubah/{id}', [
                'uses' => 'Master\StatusPerkawinanController@edit',
                'as' => 'master.status_perkawinan.edit'
            ]);
            Route::post('/simpan', [
                'uses' => 'Master\StatusPerkawinanController@store',
                'as' => 'master.status_perkawinan.store'
            ]);
            Route::put('/ubah/{id}', [
                'uses' => 'Master\StatusPerkawinanController@update',
                'as' => 'master.status_perkawinan.update'
            ]);
            Route::delete('/hapus/{id}', [
                'uses' => 'Master\StatusPerkawinanController@destroy',
                'as' => 'master.status_perkawinan.destroy'
            ]);
        });
        Route::group(['prefix' => 'penduduk'], function(){
            Route::group(['prefix' => 'api'], function(){
                Route::get('/data-nik', [
                    'uses' => 'Master\PendudukController@APIdataNIK',
                ]);
                Route::get('/data/{nik}', [
                    'uses' => 'Master\PendudukController@APIdata',
                ]);
            });
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
    Route::group(['prefix' => 'kaur-umum'], function(){
        Route::group(['prefix' => 'skck'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Umum\SKCKController@index',
                'as' => 'kaur.umum.skck.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Umum\SKCKController@data',
                'as' => 'kaur.umum.skck.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Umum\SKCKController@create',
                'as' => 'kaur.umum.skck.create'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Umum\SKCKController@surat',
                'as' => 'kaur.umum.skck.surat'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Umum\SKCKController@store',
                'as' => 'kaur.umum.skck.store'
            ]);
        });
    });
});
