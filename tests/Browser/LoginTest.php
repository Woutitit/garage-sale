<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase {

    use DatabaseMigrations;

    public function testAUserCanLogin() {



        $user = factory(User::class)->create([
            'email' => 'wout.borghgraef@example.com',
            'path' => 'wout.borghgraef'
            ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
            ->type('email', $user->email)
            ->type('password', 'secret')
            ->press('Login')
            ->assertPathIsNot($user->path . '/items');
        });
    }
}
