<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        $customer = Customer::create(request()->only([
            'name',
            'street',
            'city',
            'zip',
            'email',
            'driver_licence_number'
        ]));

        if(request()->file()) {
            $customer->update(
                [
                    'driver_licence' => request()
                        ->file('driver_licence')
                        ->store("licences/{$customer->id}", 'public')
                ]
            );
        }

        return redirect(route('customers.index'));
    }
}
