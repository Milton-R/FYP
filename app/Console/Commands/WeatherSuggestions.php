<?php

namespace App\Console\Commands;

use App\Http\Controllers\WeatherController;
use App\Mail\WeatherAdvice;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WeatherSuggestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:WeatherSuggestions';

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

        $coor = User::distinct()->get('coor');
        foreach ($coor as $place) {

            $advice = WeatherSuggestions::local($place->coor);
            $users = User::where('coor', $place->coor)->get();
            foreach ($users as $user) {

                $outplants = $user->plants()->where('localType', 2)->get();


                foreach ($outplants as $outplant) {
                    $outplantdate = Carbon::create($outplant->waterReminder);


                    $daterange = date_diff($datetoday, $outplantdate);

                    if ($daterange->days <= 4) {
                        if ($advice == "Raining this week!") {

                            if ($outplant->waterOrnot == 1) {

                                $outplant->update(['waterOrnot' => '2']);
                            }
                        } else
                            $outplant->update(['waterOrnot' => '1']);
                    }
                }

                if($advice=='Raining this week!'){

                    Mail::to($user->email)->send(new WeatherAdvice($advice));

                }elseif($advice=='Raining this week!') {
                    Mail::to($user->email)->send(new WeatherAdvice($advice));
                }

            }
        }
    }

    public function index($woeid)
    {

        $client = new Client();
        $response = $client->request('GET', 'https://www.metaweather.com/api/location/' . $woeid . '/');
        $statusCode = $response->getStatusCode();
        $array = $response->getBody();
        $json = json_decode($array);
        $d = collect($json->consolidated_weather);


        $counter = 0;

        foreach ($d as $forecast) {
            $day = $forecast->weather_state_name;
            if ($day === 'Heavy Rain' or $day === 'Light Rain' or $day === 'Showers') {
                $counter = $counter + 1;
            }

        }

        if ($counter >= 3) {
            return 'Raining this week!';
        } else {

            return 'Mostly Dry this week!';
        }


    }


    public function local($place)
    {

        $loc = new Client;
        $loccode = $loc->request('GET', 'https://www.metaweather.com/api/location/search/?lattlong=' . $place . '');
        $locbod = $loccode->getBody();
        $localss = json_decode($locbod, true);
        $woeid = $localss[0]['woeid'];

        $advice = WeatherSuggestions::index($woeid);

        return ($advice);
    }

}
