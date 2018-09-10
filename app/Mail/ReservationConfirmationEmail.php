<?php

namespace App\Mail;

use App\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservationConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Reservation
     */
    public $reservation;

    /**
     * Create a new message instance.
     *
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        //
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.reservation.confirmation');
    }
}
