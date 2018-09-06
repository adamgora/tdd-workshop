<?php

namespace Tests\Feature\Reservations;

use App\Reservation;
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

    public function testShouldAllowUserToCreateReservation()
    {
        $this->signIn();

        //given we have a reservation data
        $reservation = make(Reservation::class);

        //when user post proper data
        $this->post(route('reservations.store'), $reservation->toArray())
            ->assertRedirect(route('reservations.index'));

        //then a reservation should be created
        $this->get(route('reservations.index'))
            ->assertSee($reservation->customer->name)
            ->assertSee($reservation->car->registration_number);

    }
}
