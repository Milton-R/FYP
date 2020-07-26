<?php

namespace App\Http\Controllers;


use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeatherSuggestion;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Collection;

class WeatherController extends Controller
{

    public function cityCollection()
    {
        $datetoday = Carbon::today();

        $coor = User::distinct()->get('coor');
        foreach ($coor as $place) {

            $advice = WeatherController::local($place->coor);
            $users = User::where('coor', $place->coor)->get();
            foreach ($users as $user) {

                $outplants = $user->plants()->where('localType', 2)->get();


                foreach ($outplants as $outplant) {
                    $outplantdate = Carbon::create($outplant->waterReminder);


                    $daterange = date_diff($datetoday, $outplantdate);
                    echo $daterange->format('%a days');
                    if ($daterange->days <= 4) {
                        if ($advice == "its gone rain this weak no need to water your plants") {

                            if ($outplant->waterOrnot == 1) {

                                $outplant->update(['waterOrnot' => '2']);


                            }


                        } else
                            $outplant->update(['waterOrnot' => '1']);
                    }

                }


                Mail::to($user->email)->send(new WeatherSuggestion($advice));

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
            return 'its gone rain this weak no need to water your plants';
        } else {

            return 'its not going to rain so you better water your plant';
        }


    }


    public function local($place)
    {

        $loc = new Client;
        $loccode = $loc->request('GET', 'https://www.metaweather.com/api/location/search/?lattlong=' . $place . '');
        $locbod = $loccode->getBody();
        $localss = json_decode($locbod, true);
        $woeid = $localss[0]['woeid'];

        $advice = WeatherController::index($woeid);

        return ($advice);
    }
}
