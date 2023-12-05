<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CompraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCompraBasico(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8080/')
                ->maximize()
                ->pause(1000)
                ->scrollIntoView('@pricingSection')
                ->pause(1000)
                ->press('@escolherPlanoBasico')
                ->pause(1000)
                ->scrollIntoView('@finalizarCompraBasico')
                ->pause(1000)
                ->press('@escolherPlanoBasico')
                ->pause(1000)
                ->screenshot('compraResult');
        });
    }
}
