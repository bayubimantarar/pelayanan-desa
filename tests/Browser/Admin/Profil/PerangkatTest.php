<?php

namespace Tests\Browser\Admin\Profil;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use App\Models\Master\Pengguna;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PerangkatTest extends DuskTestCase
{
    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function visitPerangkat()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/perangkat')
    //             ->pause('1000')
    //             ->assertPathIs('/profil/perangkat')
    //             ->screenshot('visitPerangkat');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function createPerangkat()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/perangkat')
    //             ->clickLink('Tambah')
    //             ->type('nama', 'John Doe')
    //             ->type('jabatan', 'Staf Desa')
    //             ->press('Simpan')
    //             ->assertPathIs('/profil/perangkat')
    //             ->screenshot('createPerangkat');
    //     });
    // }

    // *
    //  * A Dusk test example.
    //  * @test
    //  * @return void

    // public function searchPerangkat()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/perangkat')
    //             ->type('#perangkat-table_filter > label > input', 'John Doe')
    //             ->pause('1000')
    //             ->screenshot('searchPerangkat');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function updatePerangkat()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/perangkat')
    //             ->type('#perangkat-table_filter > label > input', 'John Doe')
    //             ->pause('1000')
    //             ->clickLink('Ubah')
    //             ->type('nama', 'Jane Doe')
    //             ->type('jabatan', 'Sekretaris KAUR')
    //             ->press('Simpan')
    //             ->pause('1000')
    //             ->assertPathIs('/profil/perangkat')
    //             ->screenshot('updatePerangkat');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function deletePerangkat()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->loginAs(Pengguna::find(1), 'pengguna')
    //             ->visit('/profil/perangkat')
    //             ->pause('1000')
    //             ->type('#perangkat-table_filter > label > input', 'John Doe')
    //             ->pause('1000')
    //             // ->clickLink('Hapus')
    //             // ->pause('1000')
    //             // ->acceptDialog()
    //             // ->type('#perangkat-table_filter > label > input', '')
    //             ->screenshot('deletePerangkat');
    //     });
    // }
}
