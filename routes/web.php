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
                Route::get('/data-nama', [
                    'uses' => 'Master\PendudukController@APIdataNama',
                ]);
                Route::get('/data/{nik}', [
                    'uses' => 'Master\PendudukController@APIdata',
                ]);
                Route::get('/data-by-nama/{nama}', [
                    'uses' => 'Master\PendudukController@APIdataByNama',
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
    Route::group(['prefix' => 'kaur-ekbang'], function(){
        Route::group(['prefix' => 'keterangan-usaha'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Ekbang\KeteranganUsahaController@index',
                'as' => 'kaur_ekbang.keterangan_usaha.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Ekbang\KeteranganUsahaController@data',
                'as' => 'kaur_ekbang.keterangan_usaha.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Ekbang\KeteranganUsahaController@create',
                'as' => 'kaur_ekbang.keterangan_usaha.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Ekbang\KeteranganUsahaController@store',
                'as' => 'kaur_ekbang.keterangan_usaha.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Ekbang\KeteranganUsahaController@surat',
                'as' => 'kaur_ekbang.keterangan_usaha.surat'
            ]);
        });
    });
    Route::group(['prefix' => 'kaur-umum'], function(){
        Route::group(['prefix' => 'skck'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Umum\SKCKController@index',
                'as' => 'kaur_umum.skck.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Umum\SKCKController@data',
                'as' => 'kaur_umum.skck.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Umum\SKCKController@create',
                'as' => 'kaur_umum.skck.create'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Umum\SKCKController@surat',
                'as' => 'kaur_umum.skck.surat'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Umum\SKCKController@store',
                'as' => 'kaur_umum.skck.store'
            ]);
        });
        Route::group(['prefix' => 'keterangan-ghoib'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Umum\KeteranganGhoibController@index',
                'as' => 'kaur_umum.keterangan_ghoib.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Umum\KeteranganGhoibController@data',
                'as' => 'kaur_umum.keterangan_ghoib.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Umum\KeteranganGhoibController@create',
                'as' => 'kaur_umum.keterangan_ghoib.create'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Umum\KeteranganGhoibController@surat',
                'as' => 'kaur_umum.keterangan_ghoib.surat'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Umum\KeteranganGhoibController@store',
                'as' => 'kaur_umum.keterangan_ghoib.store'
            ]);
        });
    });
    Route::group(['prefix' => 'kaur-tantrib-dan-umum'], function(){
        Route::group(['prefix' => 'keterangan-bersih-diri'], function(){
            Route::get('/', [
                'uses' => 'KAUR\TantribUmum\KeteranganBersihDiriController@index',
                'as' => 'kaur_tantrib_dan_umum.keterangan_bersih_diri.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\TantribUmum\KeteranganBersihDiriController@data',
                'as' => 'kaur_tantrib_dan_umum.keterangan_bersih_diri.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\TantribUmum\KeteranganBersihDiriController@create',
                'as' => 'kaur_tantrib_dan_umum.keterangan_bersih_diri.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\TantribUmum\KeteranganBersihDiriController@store',
                'as' => 'kaur_tantrib_dan_umum.keterangan_bersih_diri.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\TantribUmum\KeteranganBersihDiriController@surat',
                'as' => 'kaur_tantrib_dan_umum.keterangan_bersih_diri.surat'
            ]);
        });
        Route::group(['prefix' => 'keterangan-kehilangan'], function(){
            Route::get('/', [
                'uses' => 'KAUR\TantribUmum\KeteranganKehilanganController@index',
                'as' => 'kaur_tantrib_dan_umum.keterangan_kehilangan.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\TantribUmum\KeteranganKehilanganController@data',
                'as' => 'kaur_tantrib_dan_umum.keterangan_kehilangan.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\TantribUmum\KeteranganKehilanganController@create',
                'as' => 'kaur_tantrib_dan_umum.keterangan_kehilangan.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\TantribUmum\KeteranganKehilanganController@store',
                'as' => 'kaur_tantrib_dan_umum.keterangan_kehilangan.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\TantribUmum\KeteranganKehilanganController@surat',
                'as' => 'kaur_tantrib_dan_umum.keterangan_kehilangan.surat'
            ]);
        });
        Route::group(['prefix' => 'keterangan-izin-rame'], function(){
            Route::get('/', [
                'uses' => 'KAUR\TantribUmum\KeteranganIzinRameController@index',
                'as' => 'kaur_tantrib_dan_umum.keterangan_izin_rame.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\TantribUmum\KeteranganIzinRameController@data',
                'as' => 'kaur_tantrib_dan_umum.keterangan_izin_rame.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\TantribUmum\KeteranganIzinRameController@create',
                'as' => 'kaur_tantrib_dan_umum.keterangan_izin_rame.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\TantribUmum\KeteranganIzinRameController@store',
                'as' => 'kaur_tantrib_dan_umum.keterangan_izin_rame.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\TantribUmum\KeteranganIzinRameController@surat',
                'as' => 'kaur_tantrib_dan_umum.keterangan_izin_rame.surat'
            ]);
        });
    });
    Route::group(['prefix' => 'kaur-pemerintahan'], function(){
        Route::group(['prefix' => 'keterangan-domisili'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Pemerintahan\KeteranganDomisiliController@index',
                'as' => 'kaur_pemerintahan.keterangan_domisili.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Pemerintahan\KeteranganDomisiliController@data',
                'as' => 'kaur_pemerintahan.keterangan_domisili.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Pemerintahan\KeteranganDomisiliController@create',
                'as' => 'kaur_pemerintahan.keterangan_domisili.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Pemerintahan\KeteranganDomisiliController@store',
                'as' => 'kaur_pemerintahan.keterangan_domisili.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Pemerintahan\KeteranganDomisiliController@surat',
                'as' => 'kaur_pemerintahan.keterangan_domisili.surat'
            ]);
        });
        Route::group(['prefix' => 'keterangan-beda-identitas'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Pemerintahan\KeteranganBedaIdentitasController@index',
                'as' => 'kaur_pemerintahan.keterangan_beda_identitas.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Pemerintahan\KeteranganBedaIdentitasController@data',
                'as' => 'kaur_pemerintahan.keterangan_beda_identitas.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Pemerintahan\KeteranganBedaIdentitasController@create',
                'as' => 'kaur_pemerintahan.keterangan_beda_identitas.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Pemerintahan\KeteranganBedaIdentitasController@store',
                'as' => 'kaur_pemerintahan.keterangan_beda_identitas.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Pemerintahan\KeteranganBedaIdentitasController@surat',
                'as' => 'kaur_pemerintahan.keterangan_beda_identitas.surat'
            ]);
        });
        Route::group(['prefix' => 'keterangan-ktp-sementara'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKTPSementaraController@index',
                'as' => 'kaur_pemerintahan.keterangan_ktp_sementara.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKTPSementaraController@data',
                'as' => 'kaur_pemerintahan.keterangan_ktp_sementara.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKTPSementaraController@create',
                'as' => 'kaur_pemerintahan.keterangan_ktp_sementara.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKTPSementaraController@store',
                'as' => 'kaur_pemerintahan.keterangan_ktp_sementara.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKTPSementaraController@surat',
                'as' => 'kaur_pemerintahan.keterangan_ktp_sementara.surat'
            ]);
        });
        Route::group(['prefix' => 'keterangan-kk-sementara'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKKSementaraController@index',
                'as' => 'kaur_pemerintahan.keterangan_kk_sementara.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKKSementaraController@data',
                'as' => 'kaur_pemerintahan.keterangan_kk_sementara.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKKSementaraController@create',
                'as' => 'kaur_pemerintahan.keterangan_kk_sementara.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKKSementaraController@store',
                'as' => 'kaur_pemerintahan.keterangan_kk_sementara.store'
            ]);
            Route::get('/surat/{id}', [
                'uses' => 'KAUR\Pemerintahan\KeteranganKKSementaraController@surat',
                'as' => 'kaur_pemerintahan.keterangan_kk_sementara.surat'
            ]);
        });
    });
    Route::group(['prefix' => 'kaur-kesra'], function(){
        Route::group(['prefix' => 'sktm'], function(){
            Route::get('/', [
                'uses' => 'KAUR\Kesra\SKTMController@index',
                'as' => 'kaur_kesra.sktm.index'
            ]);
            Route::get('/data', [
                'uses' => 'KAUR\Kesra\SKTMController@data',
                'as' => 'kaur_kesra.sktm.data'
            ]);
            Route::get('/form-tambah', [
                'uses' => 'KAUR\Kesra\SKTMController@create',
                'as' => 'kaur_kesra.sktm.create'
            ]);
            Route::post('/simpan', [
                'uses' => 'KAUR\Kesra\SKTMController@store',
                'as' => 'kaur_kesra.sktm.store'
            ]);
        });
    });
});
