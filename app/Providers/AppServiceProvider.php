<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Master\Agama;
use App\Models\PermintaanSurat;
use App\Models\Master\JenisKelamin;
use App\Models\Profil\Pemerintahan;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = Carbon::setLocale('id');

        view()->composer('*', function ($view) {
            if($view->getName() == 'layouts.main') {
                $permintaanSurat = PermintaanSurat::orderBy('created_at', 'desc')->where('status_proses', '=', 'Belum diproses')->take(3)->get();

                $totalPermintaanSurat = PermintaanSurat::where('status_proses', '=', 'Belum diproses')->count();

                $data = [
                    'permintaanSurat' => $permintaanSurat,
                    'totalPermintaanSurat' => $totalPermintaanSurat
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.frontend.main') {
                $pemerintahan = Pemerintahan::first();

                $data = [
                    'pemerintahan' => $pemerintahan,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.frontend.partials.form_surat.keterangan_tidak_mampu') {
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.frontend.partials.form_surat.keterangan_kelahiran') {
                $agama = Agama::all();
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'agama' => $agama,
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.frontend.partials.form_surat.keterangan_kematian') {
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.partials.form_surat.keterangan_tidak_mampu') {
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.partials.form_surat.keterangan_kelahiran') {
                $agama = Agama::all();
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'agama' => $agama,
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }

            if($view->getName() == 'layouts.partials.form_surat.keterangan_kematian') {
                $jenisKelamin = JenisKelamin::all();

                $data = [
                    'jenisKelamin' => $jenisKelamin,
                ];

                $view->with($data);
            }
        });
    }
}
