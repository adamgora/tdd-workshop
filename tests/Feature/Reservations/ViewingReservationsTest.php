<?php

namespace Tests\Feature\Reservations;

use App\Reservation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewingReservationsTest extends TestCase
{
    use DatabaseMigrations;

    public function testShouldDisplayReservationsIndexViewToSignedInUser()
    {
        //given we have a signed in user
        $this->signIn();

        //when the user makes get request to the index page
        //then 200 status should be received
        $this->get(route('reservations.index'))
            ->assertStatus(200);

    }

    public function testShouldRedirectUnauthorizedUsersToLoginPage()
    {
        $this->withExceptionHandling();

        //when someone tries to make get request to index page
        //then he should be redirected to login page
        $this->get(route('reservations.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testShouldDisplayReservationsFromDatabase()
    {
        //given we have a reservation
        $this->signIn();
        $reservation = create(Reservation::class);

        //when we vistit index page
        //then response should contain reservation details
        $this->get(route('reservations.index'))
            ->assertSee($reservation->customer->name)
            ->assertSee($reservation->car->registration_number);
    }
}
