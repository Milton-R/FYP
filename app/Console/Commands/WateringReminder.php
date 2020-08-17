<?php

namespace App\Console\Commands;

use App\Http\Controllers\WateringController;
use App\Mail\wateringDelay;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WateringReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:WateringReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datetoday = Carbon::today();
        $systemUsers = User::all();

        foreach ($systemUsers as $systemUser) {
            $plantstowater = $systemUser->plants()->get();

            foreach ($plantstowater as $plantToWater) {
                $plantdate = Carbon::create($plantToWater->waterReminder);
                $daterange = date_diff($datetoday, $plantdate);

                if ($plantToWater->waterOrnot == 2) {

                    $plantLocation = $plantToWater->location;
                    WateringReminder::reminderFrequencing($plantToWater, $systemUser->email, $plantLocation);

                } elseif ($daterange->days == 0 & $plantToWater->waterOrnot == 1) {
                    $plantLocation = $plantToWater->location;
                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);
                    $newdate = $plantToWaterdate->addDay($plantToWater->repetitions);
                    $plantToWater->update(['lastWatered' => $datetoday->toDateString(), 'waterReminder' => $newdate->toDateString()]);
                    Mail::to($systemUser->email)->send(new \App\Mail\WateringReminder($plantToWater, $plantLocation->name));
                }
            }
        }
    }

    public function waterPlantdelay($plantToWater, $email, $plantLocation)
    {
        $reminderWaterdate = Carbon::create($plantToWater->waterReminder);
        $newdate = $reminderWaterdate->addDay($plantToWater->repetitions);
        $plantToWater->update(['waterReminder' => $newdate->toDateString(), 'waterOrnot' => '1',]);
        Mail::to($email)->send(new wateringDelay($plantToWater, $plantLocation->name));
    }


    public function waterPlantToday($plantToWater, $email, $plantLocation)
    {
        $datetoday = Carbon::now();
        $plantToWaterupdate= Carbon::create($plantToWater->waterReminder);
        $newdate = $plantToWaterupdate->addDay($plantToWater->repetitions);
        $plantToWater->update(['lastWatered' => $datetoday->toDateString(), 'waterReminder' => $newdate->toDateString(), 'waterOrnot' => '1',]);
        Mail::to($email)->send(new \App\Mail\Watertoday($plantToWater, $plantLocation->name));

    }


    public function reminderFrequencing($plantToWater, $email, $plantLocation)
    {
        $datetoday = Carbon::now();
        $updatedplant = $plantToWater;
        $lastWaterdate = Carbon::create($updatedplant->lastWatered);
        $daydifference = date_diff($lastWaterdate, $datetoday);


        switch ($plantToWater->repetitions) {
            case 1:
                if($daydifference->days > 0){
                    WateringReminder::waterPlantToday($plantToWater, $email, $plantLocation);
                }else {
                    WateringReminder::waterPlantdelay($plantToWater, $email, $plantLocation);
                }
                break;
            case 3:
                if($daydifference->days >=3){
                    WateringReminder::waterPlantToday($plantToWater, $email, $plantLocation);
                }else {
                    WateringReminder::waterPlantdelay($plantToWater, $email, $plantLocation);
                }
                break;
            case 7:
                if($daydifference->days >= 7){
                    WateringReminder::waterPlantToday($plantToWater, $email, $plantLocation);
                }else {
                    WateringReminder::waterPlantdelay($plantToWater, $email, $plantLocation);
                }
                break;
        }
    }
}



