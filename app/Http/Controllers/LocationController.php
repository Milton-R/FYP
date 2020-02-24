<?php

namespace App\Http\Controllers;

use App\Locations;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;
use PHPUnit\Util\PHP\AbstractPhpProcess;

class LocationController extends Controller
{
    //
    public function index(){

        $localInGarden = Locations::all();

        return view('locations' , compact('localInGarden'));

    }
    public function store(){


    }
    public function show(){


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
