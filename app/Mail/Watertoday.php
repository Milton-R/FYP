<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Watertoday extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $plantToWater;
    public $location;
    public function __construct($plantToWater,$location)
    {
        $this->plantToWater=$plantToWater;
        $this->location=$location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.UrgentWaterReminderEmail')
        ->subject("Urgent Watering Reminder may be needed!")
        ->with([
            'plantToWater' => $this->plantToWater,
            'location'=>$this->location,
        ]);
    }
}
