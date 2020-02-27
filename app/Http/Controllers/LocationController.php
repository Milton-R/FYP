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
        return view('location.index' , compact('locations'));

    }
    public function store(){

//        $data->request()->validate([
//            'name'=>'required',
//            'picture'=>'nullable',
//            'notes'=>'required',
//
//        ]);
//        \APP\Locations::create($data);

        var_dump(request('locationpic'));
        var_dump(request('locationNamef'));
        var_dump(request('plantTypeF'));
        var_dump(request('otherPlantTypef'));
        var_dump(request('locationNamef'));


      //  return  redirect('/customers') ;
    }
    public function show($id){

        $user = Auth::id();
        $location = User::find($user)->locations->find($id);
        return view('location.show' , compact('location'));

    }
    public function edit(){

        return view('location.show_location' , compact('location'));

    }
    public function create(){

        $user_id = Auth::id();
        return view('location.create' , compact('user_id'));
    }

    public function update(){



    }
    public function destroy($id){

        $user = Auth::id();
        $location = User::find($user)->locations->find($id);
        return view('location.show_location' , compact('location'));

    }

}
