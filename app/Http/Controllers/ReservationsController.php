<?php

namespace App\Http\Controllers;

use App\Car;
use App\Customer;
use App\Mail\ReservationConfirmationEmail;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        return view('reservations.create', [
            'cars' => Car::all(),
            'customers' => Customer::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
           'car_id' => 'required|exists:cars,id',
           'customer_id' => 'required|exists:customers,id',
        ]);

        $reservation = Reservation::create(request()->all());

        Mail::to($reservation->customer)->send(new ReservationConfirmationEmail($reservation));
        return redirect(route('reservations.index'));
    }
}
