<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Your_Booking extends Mailable
{
    use Queueable, SerializesModels;
      public $name;
      public $booking_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $booking_id)
    {
        $this->name = $name;
        $this->booking_id = $booking_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.applicationsent');
    }
}
