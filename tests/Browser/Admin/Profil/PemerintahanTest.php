<?php

namespace Tests\Browser\Admin\Profil;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Master\Pengguna;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PemerintahanTest extends DuskTestCase
{
    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function visitPemerintahan()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/pemerintahan')
    //             ->assertPathIs('/profil/pemerintahan')
    //             ->screenshot('visitPemerintahan');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function updatePemerintahan()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/pemerintahan')
    //             ->type('kabupaten', 'Bandung Barat')
    //             ->type('kecamatan', 'Ngamprah')
    //             ->type('desa', 'Cilame')
    //             ->type('nama_kepala_desa', 'Aas Mohamad Asor, S.H')
    //             ->type('email', 'info@cilame.desa.id')
    //             ->type('alamat', 'Jalan Galudra No. 37 Desa Cilame Kec. Ngamprah 40552')
    //             ->press('Simpan')
    //             ->assertPathIs('/profil/pemerintahan')
    //             ->screenshot('updatePemerintahan');
    //     });
    // }
}
