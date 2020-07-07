<?php

namespace App\Http\Controllers;


use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class WeatherController extends Controller
{
    public $cities = array();

    public function cityCollection(){

        $city = User::distinct()->get('city');
        foreach ($city as $place ){
            $client = new Client();
            $response = $client->request('GET', 'https://samples.openweathermap.org/data/2.5/weather?q=London&appid=66558235d392bd37f58293db6dd6f887');
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            dd($body.cord);

            $user_email = User::where('city',$place->city)->get('email');
            foreach ($user_email as $mail){
                print_r($mail->email);

            }
        }
    }


    public function index()
    {
        $apikey='7420a840598c41eb94321709202706';
        $paa='http://api.worldweatheronline.com/premium/v1/weather.ashx?key='.$apikey.'&q=London&num_of_days=7&tp=24&mca=no&show_comments=no&format=json';

        $loc =new Client;
        $loccode= $loc ->request('GET', 'https://www.metaweather.com/api/location/search/?query=london');
        $locbod=$loccode->getBody();
        $localss = json_decode($locbod,true);
        $v = collect($localss);
        var_dump($localss[0]['woeid']);

//        $client = new Client();
//        $response = $client->request('GET', 'https://www.metaweather.com/api/location/'.$localss.'/');
//        $statusCode = $response->getStatusCode();
////        $body = $response->getBody()->getContents();
//        $body = json_decode($response->getBody(), true);
//
//        $array = $response->getBody();
//        $json = json_decode($array);
//        $d=collect($json->consolidated_weather);
//
//        //$c = collect($access->weather);
//
//        $hottemp=0;
//
//        foreach ($d as $forecast){
//           // $for = $forecast->avgtempC;
//            ($forecast -> weather_state_name);
//
////            if ($forecast->avgtemp > 20){
////                    $hottemp=$hottemp+1;
////            }
//
//        }
//
//



    }

    public function weathersuggestion($something){


    }
}
