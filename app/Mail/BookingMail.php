<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $stripe;
    public $pickup_date;
    public $dropoff_date;
    public $totalRent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $stripe, $pickup_date, $dropoff_date, $totalRent)
    {
        $this->request = $request;
        $this->stripe = $stripe;
        $this->pickup_date = $pickup_date;
        $this->dropoff_date = $dropoff_date;
        $this->totalRent = $totalRent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Your booking is Confirmed';
        return $this->view('emails.confirmBooking')->subject($subject);
    }
}
