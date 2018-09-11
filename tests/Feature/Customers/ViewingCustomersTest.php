<?php

namespace Tests\Feature\Customers;

use App\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewingCustomersTest extends TestCase
{
   use DatabaseMigrations;

   public function testShouldDisplayCustomersListToSignedInUser()
   {
       //given we have a user
       $this->signIn();

       //when the user makes request to the index page
       //then the 200 status should be received
       $this->get(route('customers.index'))
           ->assertStatus(200);
   }

   public function testShouldRedirectUnauthorizedUsersToLoginPage()
   {
       $this->withExceptionHandling();

       //when the unauthorized user makes request to the index page
       //then he should be redirected to the login page
       $this->get(route('customers.index'))
           ->assertStatus(302)
           ->assertRedirect(route('login'));
   }

    public function testShouldDisplayCustomersFromDatabase()
    {
        //given we have a reservation
        $this->signIn();
        $customer = create(Customer::class);

        //when we vistit index page
        //then response should contain reservation details
        $this->get(route('customers.index'))
            ->assertSee($customer->name)
            ->assertSee($customer->driver_licence_number);
    }
}
