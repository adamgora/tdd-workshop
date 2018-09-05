<?php

namespace Tests\Unit\Models;

use App\Customer;
use App\Reservation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReservationTest extends TestCase
{
    use DatabaseMigrations;

    protected $reservation;

    public function setUp()
    {
        parent::setUp();
        $this->reservation = create(Reservation::class);

    }

    public function testShouldReservationBelongToACustomer()
    {
        //given we have a reservation
        //then a reservation should belong to a customer
        $this->assertNotNull($this->reservation->customer);
        $this->assertInstanceOf(Customer::class, $this->reservation->customer);
    }
}
