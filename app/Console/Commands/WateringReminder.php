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


                if ( $plantToWater->waterOrnot == 2) {

                    $plantLocation=$plantToWater->location;
                    $lastWaterdate = Carbon::create($plantToWater->lastWatered);

                    $updatedReminderDate = WateringReminder::reminderFrequencing($lastWaterdate, $plantToWater->repetions);


                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString(), 'waterOrnot' => '1',]);
                    Mail::to($systemUser->email)->send(new wateringDelay($plantToWater,$plantLocation->name));

                } elseif ($daterange->days == 0 & $plantToWater->waterOrnot == 1) {

                    $plantLocation=$plantToWater->location;

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);
                    $newdate = $plantToWaterdate->addDay($plantToWater->repetions);

                    $plantToWater->update(['lastWatered'=>$datetoday->toDateString(),'waterReminder' => $newdate->toDateString()]);

                    Mail::to($systemUser->email)->send(new \App\Mail\wateringDelay($plantToWater,$plantLocation->name));

                }




            }


        }
    }


    public function reminderFrequencing($lastwateredDate, $repetionfreq)
    {
        $datetoday = Carbon::now();

        switch ($repetionfreq) {
            case 1:

                $daydifference = date_diff($lastwateredDate,$datetoday);
                if($daydifference->days > 0){
                    $newdate = $datetoday;
                    return  $newdate;
                }else {
                    $newdate = $lastwateredDate->addDay();
                    return $newdate;
                }
                break;
            case 3:
                $daydifference = date_diff($lastwateredDate,$datetoday);
                if($daydifference->days >=3){
                    $newdate = $datetoday;
                    return  $newdate;
                }else{     $newdate = $lastwateredDate->addDay(3);
                    return  $newdate;}
                break;
            case 7:

                $daydifference = date_diff($lastwateredDate,$datetoday);
                if($daydifference->days >= 7){
                    $newdate = $datetoday;
                    return  $newdate;
                }else{$newdate = $lastwateredDate->addDay(7);
                    return  $newdate;}

                break;
        }

    }
}
