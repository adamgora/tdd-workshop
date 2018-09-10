<?php

namespace Tests\Feature\Reservations;

use App\Reservation;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeletingReservations extends TestCase
{
    use DatabaseMigrations;

    public function testShouldDeleteReservationIfGuardAllowsIt()
    {
        //given we have a user with admin role and a reservation
        $user = create(User::class, [
            'is_admin' => true
        ]);
        $this->signIn($user);
        $reservation = create(Reservation::class);

        //when a user makes DELETE request to endpoint
        $this->delete(route('reservations.delete', $reservation->id))
            ->assertStatus(302)
            ->assertRedirect(route('reservations.index'));

        //then the reservation should be deleted
        $this->assertEquals(0, Reservation::all()->count());
    }

    public function testShouldNotAllowToDeletionIfUserIsNotAdmin()
    {
        $this->withExceptionHandling();

        //given we have a regular user and a reservation
        $this->signIn();
        $reservation = create(Reservation::class);

        //when a user makes DELETE request to endpoint
        //then he should be redirected to index page with error
        $this->delete(route('reservations.delete', $reservation->id))
            ->assertStatus(302)
            ->assertRedirect(route('reservations.index'))
            ->assertSessionHasErrors();

    }
}
