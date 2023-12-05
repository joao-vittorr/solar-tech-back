<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BudgetTest extends DuskTestCase
{
    
    public function testBudget(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8080/')
                ->maximize()
                ->pause(1000)
                ->scrollIntoView('@BudgetSection')
                ->pause(1000)
                ->select('valorPacote', '6600')//pacote medio
                ->pause(1000)
                ->type('quantidadeAdicionalPlaca', 3)
                ->pause(1000)
                ->press('@enviarBudget')
                ->pause(1000)
                ->assertInputValue('@resultado', '9600')
                ->screenshot('BudgetResult');
        });
    }

    public function testBudgetError(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8080/')
                ->maximize()
                ->pause(1000)
                ->scrollIntoView('@BudgetSection')
                ->pause(1000)
                ->select('valorPacote', '6600')//pacote medio
                ->pause(1000)
                ->type('quantidadeAdicionalPlaca', 3)
                ->pause(1000)
                ->press('@enviarBudget')
                ->pause(1000)
                ->assertInputValueIsNot('@resultado', '9700')
                ->screenshot('BudgetResultError');
        });
    }
    
}
