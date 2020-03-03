<?php

namespace App\Http\Controllers;

use App\Locations;
use App\Plants;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Location;
use PHPUnit\Util\PHP\AbstractPhpProcess;

class LocationController extends Controller
{
    //
    public function index(){

        $user_id = Auth::id();
        $locations = User::find($user_id)->locations;
        return view('location.index' , compact('locations'));

    }

    public function store(){

        $data = request()->validate([
            'user_id' => 'required',
            'name' =>'required',
            'plantType' =>'required_without:otherType',
            'otherType' =>'nullable',
            'picture' =>'nullable',
            'notes' =>'required',
            'created_at' => 'required'
        ]);
           \App\Locations::create($data);


        return redirect('/locations');
    }

    public function show($id){

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        $plants = $location->plants;
        return view('location.show' , compact('location', 'plants'));
    }
    public function edit($id){

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        return view('location.edit' , compact('location'));

    }

    public function create(){

        $user_id = Auth::id();
        return view('location.create' , compact('user_id'));
    }

    public function update($id){
        $data = request()->validate([
            'user_id' => 'required',
            'name' =>'required',
            'plantType' =>'required_without:otherType',
            'otherType' =>'nullable',
            'picture' =>'nullable',
            'notes' =>'required',
            'created_at' => 'required'
        ]);
        $user_id = Auth::id();
        $locations = User::find($user_id)->locations->find($id);
        $locations->update($data);

        return redirect('/locations');


    }
    public function destroy($id){

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id)->delete();
        return  redirect('/locations');
    }



    public function location_create_plant($id){

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        return view('plant.create' , compact('location'));
    }

    public function location_store_plant(){

        $data = request()->validate([
            'name' =>'required',
            'amount' =>'required',
            'plant_type' =>'required',
            'picture' =>'nullable',
            'notes' =>'required',
            'planted_at' => 'required',
            'user_id' => 'required',
            'locations_id' =>'required'
        ]);

            Plants::create($data);

        return redirect('/locations');


    }


}
