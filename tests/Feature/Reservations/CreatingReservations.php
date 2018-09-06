<?php

namespace Tests\Feature\Reservations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatingReservations extends TestCase
{
    use DatabaseMigrations;

    public function testShouldDisplayReservationsCreateViewToSignedInUser()
    {
        //given we have a signed in user
        $this->signIn();

        //when the user makes get request to the index page
        //then 200 status should be received
        $this->get(route('reservations.create'))
            ->assertStatus(200);

    }

    public function testShouldRedirectUnauthorizedUsersToLoginPage()
    {
        //when someone tries to make get request to index page
        //then he should be redirected to login page
        $this->get(route('reservations.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
