<?php

namespace App\Http\Controllers;

use App\Car;
use App\Customer;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservations = Reservation::with(['customer', 'car'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $cars = Car::all();
        $customers = Customer::all();
        return view('reservations.create', compact(['cars', 'customers']));
    }

    public function store()
    {
        Reservation::create(request()->all());
        return redirect(route('reservations.index'));
    }
}
