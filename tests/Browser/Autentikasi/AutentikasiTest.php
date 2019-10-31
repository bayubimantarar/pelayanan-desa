<?php

namespace Tests\Browser\Autentikasi;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AutentikasiTest extends DuskTestCase
{
    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function loginUserAdmin()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/autentikasi/form-login')
    //             ->type('email', 'bayu@desa.id')
    //             ->type('password', '123')
    //             ->press('Masuk')
    //             ->assertPathIs('/')
    //             ->screenshot('loginUserAdmin');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function loginUserStafDesa()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/autentikasi/form-login')
    //             ->type('email', 'resti@desa.id')
    //             ->type('password', '123')
    //             ->press('Masuk')
    //             ->assertPathIs('/')
    //             ->screenshot('loginUserStafDesa');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function loginWithEmptyEmail()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/autentikasi/form-login')
    //             ->type('email', null)
    //             ->type('password', '123')
    //             ->press('Masuk')
    //             ->assertPathIs('/autentikasi/form-login')
    //             ->screenshot('loginWithEmptyEmail');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function loginWithEmptyKataSandi()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/autentikasi/form-login')
    //             ->type('email', 'bayu@desa.id')
    //             ->type('password', null)
    //             ->press('Masuk')
    //             ->assertPathIs('/autentikasi/form-login')
    //             ->screenshot('loginWithEmptyKataSandi');
    //     });
    // }

    // /**
    //  * A Dusk test example.
    //  * @test
    //  * @return void
    //  */
    // public function loginInvalidUser()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/autentikasi/form-login')
    //             ->type('email', 'john@desa.id')
    //             ->type('password', '321')
    //             ->press('Masuk')
    //             ->assertPathIs('/autentikasi/form-login')
    //             ->screenshot('loginInvalidUser');
    //     });
    // }
}
