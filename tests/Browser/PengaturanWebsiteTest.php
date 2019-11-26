<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PengaturanWebsiteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function visitPengaturanWebsite()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/pengaturan-website')
                ->press('Selanjutnya')
                ->type('kabupaten', 'Bandung Barat')
                ->type('kecamatan', 'Ngamprah')
                ->type('desa', 'Cilame')
                ->type('nama_kepala_desa', 'Aas Mohamad Asor, S.H')
                ->type('email_desa', 'info@cilame.desa.id')
                ->type('alamat_desa', 'Jl. Galudra No. 27 Cilame Ngamprah Bandung Barat 40552')
                ->pause('1000')
                ->press('Selanjutnya')
                ->type('nama', 'Bayu Bimantara')
                ->type('nomor_telepon', '0895332055486')
                ->type('alamat', 'Bukit Permata Blok A1 No. 14')
                ->type('email', 'bayu@cilame.desa.id')
                ->type('password', '123')
                ->press('Selanjutnya')
                ->pause('1000')
                ->screenshot('visitPengaturanWebsite');
        });
    }
}
