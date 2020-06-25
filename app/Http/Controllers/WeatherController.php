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
        $client = new Client();
        $response = $client->request('GET', 'https://samples.openweathermap.org/data/2.5/weather?q=London&appid=66558235d392bd37f58293db6dd6f887');
        $statusCode = $response->getStatusCode();
//        $body = $response->getBody()->getContents();
        $body = json_decode($response->getBody(), true);

        $array = $response->getBody();
        $json = json_decode($array, true);
        $collection = collect($json);
        $access = $collection->get('main');

        $c = collect($access);
        $tem = $c->get('temp_min');

        dd($collection);
//        dd($access);


    }
}
