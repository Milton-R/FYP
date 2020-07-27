<?php

namespace App\Http\Controllers;

use App\Mail\WeatherSuggestion;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


                if ($daterange->days == 0 & $plantToWater->waterOrnot == 2) {

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);

                    $updatedReminderDate = WateringController::reminderFrequencing($plantToWaterdate, $plantToWater->repetions);

                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString(), 'waterOrnot' => '1',]);
                    echo $plantToWater , 'delay';

                } elseif ($daterange->days == 0 & $plantToWater->waterOrnot == 1) {

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);

                    $updatedReminderDate = WateringController::reminderFrequencing($plantToWaterdate, $plantToWater->repetions);

                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString()]);

                    Mail::to($systemUser->email)->send(new WeatherSuggestion($plantToWater));

                }


            }


        }
    }


    public function reminderFrequencing($waterReminderDate, $repetionfreq)
    {

        switch ($repetionfreq) {
            case 1:
               $newdate = $waterReminderDate->addDay(3); ;
                return  $newdate;
                break;
            case 2:
                $newdate = $waterReminderDate->addWeek();
                return  $newdate;
                break;
            case 3:
                $newdate = $waterReminderDate->addWeek(2);
                return  $newdate;
                break;
            case 4;
                $newdate = $waterReminderDate->addMonth();
                return  $newdate;
                break;

        }

    }
}
