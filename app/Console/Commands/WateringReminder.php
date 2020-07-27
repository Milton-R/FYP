<?php

namespace App\Console\Commands;

use App\Http\Controllers\WateringController;
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


                if ($daterange->days == 0 & $plantToWater->waterOrnot == 2) {

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);

                    $updatedReminderDate = WateringReminder::reminderFrequencing($plantToWaterdate, $plantToWater->repetions);

                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString(), 'waterOrnot' => '1',]);
                    echo $plantToWater , 'delay';

                } elseif ($daterange->days == 0 & $plantToWater->waterOrnot == 1) {

                    $plantToWaterdate = Carbon::create($plantToWater->waterReminder);

                    $updatedReminderDate = WateringReminder::reminderFrequencing($plantToWaterdate, $plantToWater->repetions);

                    $plantToWater->update(['waterReminder' => $updatedReminderDate->toDateString()]);

                    Mail::to($systemUser->email)->send(new \App\Mail\WateringReminder($plantToWater));

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
