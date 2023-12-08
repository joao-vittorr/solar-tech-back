<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class CompraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testCompraBasico(): void
    {
        $this->browse(function (Browser $browser) {

            $userAgent = 'Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Safari/537.3';

            $browser->visit('http://localhost:8000/')
                ->driver->executeScript("Object.defineProperty(navigator, 'userAgent', {value: '{$userAgent}', writable: true});");

            $browser->scrollIntoView('@pricingSection')
                ->pause(1000)
                ->clickLink('Google')
                ->pause(1000)
                ->type('identifier', 'XXXXXXXXXXXXXXXXX')
                ->screenshot('Google')
                ->press('Avançar')
                ->pause(2000)
                ->type('Passwd', 'XXXXXXXXXXXXXXXXXX')
                ->screenshot('Google2')
                ->press('Avançar')
                ->pause(2000)
                ->assertPathIs('/')
                ->screenshot('PaginaInicial')
                ->press('@escolherPlanoBasico')
                ->pause(1000)
                ->scrollIntoView('@finalizarCompraBasico')
                ->pause(1000)
                ->assertSee('Compra Realizada Com Sucesso!')
                ->screenshot('compraResult');
        });
    }
}
