<?php

namespace App\Http\Controllers;

use App\Mail\WateringReminder;
use App\Mail\WeatherAdvice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use test\Mockery\HasUnknownClassAsTypeHintOnMethod;

class WateringController extends Controller
{
    public function waterReminder()
    {
        $datetoday = Carbon::today();
        $systemUsers = User::all();

        foreach ($systemUsers as $systemUser) {
            $plantstowater = $systemUser->plants()->get();

            foreach ($plantstowater as $plantToWater) {
                $plantdate = Carbon::create($plantToWater->waterReminder);

                $daterange = date_diff($datetoday, $plantdate);


                if ( $plantToWater->waterOrnot == 2) {

                    $lastWaterdate = Carbon::create($plantToWater->lastWatered);
                    $updatedReminderDate = WateringController::reminderFrequencing($lastWaterdate, $plantToWater->repetions);

                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString(), 'waterOrnot' => '1',]);
                    echo $plantToWater , 'delay';

                } elseif ($daterange->days == 0 & $plantToWater->waterOrnot == 1) {

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);
                    $newdate = $plantToWaterdate->addDay($plantToWater->repetions);

                    $plantToWater->update(['lastWatered'=>$datetoday->toDateString(),'waterReminder' => $newdate->toDateString()]);

                    Mail::to($systemUser->email)->send(new WateringReminder($plantToWater));

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
            case 2:
                $daydifference = date_diff($lastwateredDate,$datetoday);
                if($daydifference->days >=3){
                    $newdate = $datetoday;
                    return  $newdate;
                }else{     $newdate = $lastwateredDate->addDay(3);
                    return  $newdate;}
                break;
            case 3:

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
