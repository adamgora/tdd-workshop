<?php

namespace Tests\Feature\Reservations;

use App\Reservation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeletingReservations extends TestCase
{
    use DatabaseMigrations;

    public function testShouldDeleteReservation()
    {
        //given we have a user and a reservation
        $this->signIn();
        $reservation = create(Reservation::class);

        //when a user makes DELETE request to endpoint
        $this->delete(route('reservations.delete', $reservation->id))
            ->assertStatus(302)
            ->assertRedirect(route('reservations.index'));

        //then the reservation should be deleted
        $this->assertEquals(0, Reservation::all()->count());
    }
}
