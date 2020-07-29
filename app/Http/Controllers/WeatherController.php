<?php

namespace App\Http\Controllers;


use App\Mail\Norain;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeatherAdvice;
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

                $counter = 0;

                foreach ($advice as $forecast) {
                    $day = $forecast->weather_state_name;
                    if ($day === 'Heavy Rain' or $day === 'Light Rain' or $day === 'Showers') {
                        $counter = $counter + 1;
                    }

                }

                foreach ($outplants as $outplant) {

                    $todayweather = $advice[0]->weather_state_name;
                    if ($todayweather === 'Heavy Rain' or $todayweather === 'Light Rain' or $todayweather === 'Showers') {
                        $outplant->update(['lastWatered' => $datetoday->toDateString(), 'waterOrnot' => '2']);

                    } else {
                        $outplant->update(['waterOrnot' => '1']);
                    }

                    if ($counter > 3) {

                        Mail::to($user->email)->send(new WeatherAdvice($advice));



                    } elseif ($counter < 3 ) {
                        Mail::to($user->email)->send(new Norain());
                    }

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

        return $d;
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
