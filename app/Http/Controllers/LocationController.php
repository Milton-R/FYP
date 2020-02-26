<?php

namespace App\Http\Controllers;

use App\Locations;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Location;
use PHPUnit\Util\PHP\AbstractPhpProcess;

class LocationController extends Controller
{
    //
    public function index(){

        $user = Auth::id();
        $locations = User::find($user)->locations;
        return view('locations' , compact('locations'));

    }
    public function store(){


    }
    public function show($id){

        $user = Auth::id();
        $location = User::find($user)->locations->find($id);
        return view('show_location' , compact('location'));

    }
    public function edit(){


    }
    public function create(){


    }
    public function update(){


    }
    public function destroy(){


    }

}
