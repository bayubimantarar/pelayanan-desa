<?php

namespace Tests\Browser\Autentikasi;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AutentikasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function loginForm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/test')
                ->screenshot('test');
        });
    }
}
