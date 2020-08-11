<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class taskNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:taskNotification';

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
            $usertask = $systemUser->tasks()->get();

            foreach ($usertask as $task) {
                $taskdate = Carbon::create($task->due_Date);

                $daterange = date_diff($datetoday,  $taskdate );

                if ($daterange->days == 0) {
                    Mail::to($systemUser->email)->send(new \App\Mail\taskNotification($task));

                } elseif ($daterange->days == -2) {

                    Mail::to($systemUser->email)->send(new \App\Mail\taskNotification($task));

                }elseif ($daterange->days > 0 ) {

                    Mail::to($systemUser->email)->send(new \App\Mail\taskNotification($task));

                }


            }


        }

    }

}
