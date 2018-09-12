<?php

namespace App\Http\Services;


use App\Mail\ReservationConfirmationEmail;
use App\Reservation;
use Illuminate\Support\Facades\Mail;

class ReservationsService
{
    public function create(array $data)
    {
        $reservation = Reservation::create($data);
        Mail::to($reservation->customer)->send(new ReservationConfirmationEmail($reservation));
    }
}