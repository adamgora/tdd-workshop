<?php

namespace App\Http\Controllers;

use App\Car;
use App\Customer;
use App\Http\Requests\Reservations\StoreRequest;
use App\Http\Services\ReservationsService;
use App\Reservation;

class ReservationsController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @param ReservationsService $service
     */
    public function __construct(ReservationsService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
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

    public function store(StoreRequest $storeRequest)
    {
        $this->service->create(request()->all());
        return redirect(route('reservations.index'));
    }

    public function delete(Reservation $reservation)
    {
        $this->authorize('delete', Reservation::class);
        $reservation->delete();
        return back();
    }
}
