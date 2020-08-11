<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class wateringDelay extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $plantToWater;
    public $plantLocation;
    public function __construct($plantToWater,$plantLocation)
    {
        $this->plantToWater=$plantToWater;
        $this->plantLocation=$plantLocation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.WaterDelayEmail')
            ->subject("Watering Delays")
            ->with([
                'plantToWater' => $this->plantToWater,
                'plantLocation'=>$this->plantLocation,

            ]);
    }
}
