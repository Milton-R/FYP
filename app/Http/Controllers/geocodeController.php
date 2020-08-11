<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class geocodeController extends Controller
{
    public function geocode(Request $request){

        $postcode=$request->sick;
        $ps = json_encode(($postcode));

        $local =new Client;
        $loc= $local->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address='.$ps.'&key=AIzaSyCQLQiK7vb1-kfDXC77HcfZjh--TnyJTQw');
        $locbod=$loc->getBody();
        $localss = json_decode($locbod);
        $lat=$localss->results[0]->geometry->location->lat;
        $lng=$localss->results[0]->geometry->location->lng;
        $coordinate = $lat.','.$lng;




        return(json_encode($coordinate));


    }
}

