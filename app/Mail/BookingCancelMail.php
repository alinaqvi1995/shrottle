<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCancelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $stripe;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($stripe)
    {
        $this->stripe = $stripe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Your booking has been cancelled';
        return $this->view('emails.cancelBooking')->subject($subject);
    }
}
