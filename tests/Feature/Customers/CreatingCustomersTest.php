<?php

namespace Tests\Feature\Customers;

use App\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreatingCustomersTest extends TestCase
{
    use DatabaseMigrations;

    public function testShouldDisplayFormToSignedInUsers()
    {
        //given we have a signed in user
        $this->signIn();

        //when we make a get request to create form
        //then we should receive 200 status
        $this->get(route('customers.create'))
            ->assertOk();
    }

    public function testShouldRedirectUnauthorizedUsersToLoginPage()
    {
        $this->withExceptionHandling();

        //when someone tries to make get request to create page
        //then he should be redirected to login page
        $this->get(route('customers.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testShouldAllowUsersToCreateNewCustomers()
    {
        //given we have a signed in user
        $this->signIn();

        //when we make a POST request with proper form data
        $customer = make(Customer::class);

        //then a customer should be created in the database
        $this->assertEquals(0, Customer::all()->count());

        $this->post(route('customers.store', $customer->toArray()))
            ->assertRedirect(route('customers.index'));

        $this->assertEquals(1, Customer::all()->count());
    }
}
