<?php

namespace Tests\Feature\Reservations;

use App\Car;
use App\Customer;
use App\Mail\ReservationConfirmationEmail;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreatingReservationsTest extends TestCase
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
        $this->withExceptionHandling();

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

    /**
     * @dataProvider validationProvider
     */
    public function testShouldThrowValidationException($data)
    {
        create(Car::class);
        create(Customer::class);

        $this->withExceptionHandling()->signIn();

        //given a wrong data is posted
        $this->post(route('reservations.store'), $data)
            ->assertSessionHasErrors();
    }

    public function testShouldSendEmailToCustomerAfterReservationMade()
    {
        $this->signIn();
        Mail::fake();

        //given we have a reservation
        $reservation = make(Reservation::class);

        //when we make POST request to store reservation
        $this->post(route('reservations.store'), $reservation->toArray());

        //then an email should be send to the customer
        Mail::assertSent(ReservationConfirmationEmail::class);
    }

    public function validationProvider()
    {
        return [
            'car_id_doesnt_exist' => [
                [
                    'car_id' => 0,
                    'customer_id' => 1,
                    'from' => '2018-09-01 10:00:00',
                    'to' => '2018-09-01 11:00:00',
                    'total_cost' => 100
                ]
            ],
            'no_car_id_added' => [
                [
                    'customer_id' => 1,
                    'from' => '2018-09-01 10:00:00',
                    'to' => '2018-09-01 11:00:00',
                    'total_cost' => 100
                ]
            ],
            'invalid_customer_id' => [
                [
                    'car_id' => 1,
                    'customer_id' => 999,
                    'from' => '2018-09-01 10:00:00',
                    'to' => '2018-09-01 11:00:00',
                    'total_cost' => 100
                ]
            ],
        ];
    }
}
