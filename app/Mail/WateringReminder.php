<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WateringReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $plantToWater;
    public function __construct($plantToWater)
    {
        $this->plantToWater=$plantToWater;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.WaterRemindereEmail')
        ->with([
        'advice' => $this->plantToWater,

    ]);
    }
}
