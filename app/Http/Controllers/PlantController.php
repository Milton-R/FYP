<?php

namespace App\Http\Controllers;

use App\Plants;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Nature\Plant;
use test\Mockery\Php72LanguageFeaturesTest;

class PlantController extends Controller
{
    //
    public function index(){

        $user_id = Auth::id();
        $plants = User::find($user_id)->plants;
        return view('plant.index' , compact('plants'));
    }


    public function show($id){
        $user_id = Auth::id();
        $plant = User::find($user_id)->plants->find($id);
        return view('plant.show' , compact('plant'));
    }

    public function edit($id){
        $user_id = Auth::id();
        $plant = User::find($user_id)->plants->find($id);
        return view('plant.edit' , compact('plant'));
    }

    public function location_create_plant($id){
        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        return view('plant.create', compact('location'));
    }
    public function location_store_plant(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'plant_type' => 'required',
            'picture' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg,max:500',
            'notes' => 'nullable',
            'planted_at' => 'required',
            'user_id' => 'required',
            'locations_id' => 'required',
            'localType'=>'required',
            'waterOrnot'=>'nullable',
            'waterReminder'=>'required',
            'repetitions'=> 'required',
            'confirmedDelay'=>'required',
            'lastWatered'=>'nullable',
        ]);

        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $plantimage = $request->file('picture')->getClientOriginalExtension();
            $imageNameToStore = $filename . '_' . time() . '.' . $plantimage;
            $path = $request->file('picture')->storeAs('public/location', $imageNameToStore);
        } else {
            $imageNameToStore = 'noimage.jpg';
        }

        $plant=new Plants();
        $plant->name = $request->input('name');
        $plant->amount = $request->input('amount');
        $plant->plant_type = $request->input('plant_type');
        $plant->picture = $imageNameToStore;
        $plant->notes = $request->input('notes');
        $plant->planted_at = $request->input('planted_at');
        $plant->user_id = $request->input('user_id');
        $plant->locations_id = $request->input('locations_id');
        $plant->localType = $request->input('localType');
        $plant->waterOrnot = $request->input('waterOrnot');
        $plant->waterReminder = $request->input('waterReminder');
        $plant->repetitions = $request->input('repetitions');
        $plant->confirmedDelay = $request->input('confirmedDelay');
        $plant->lastWatered = $request->input('lastWatered');
        $plant->save();

        Session::flash('message', "Your plant has been added to your location we will send you an email reminding you when to water this plant. ");

        return Redirect::back();


    }


    public function update(Request $request, $id ){
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'plant_type' => 'required',
            'picture' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg,max:500',
            'notes' => 'required',
            'planted_at' => 'required',
            'user_id' => 'required',
            'locations_id' => 'required',
            'localType'=>'required',
            'waterOrnot'=>'nullable',
            'waterReminder'=>'required',
            'repetitions'=> 'required',
            'confirmedDelay'=>'required',
            'lastWatered'=>'nullable',
        ]);

        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $plantimage = $request->file('picture')->getClientOriginalExtension();
            $imageNameToStore = $filename . '_' . time() . '.' . $plantimage;
            $path = $request->file('picture')->storeAs('public/location', $imageNameToStore);
        } else {
            $imageNameToStore = 'noimage.jpg';
        }

        $user_id = Auth::id();

        $plant = User::find($user_id)->plants->find($id);
        $plant->name = $request->input('name');
        $plant->amount = $request->input('amount');
        $plant->plant_type = $request->input('plant_type');
        if ($request->hasFile('picture')) {
            $plant->picture = $imageNameToStore;
        }
        $plant->notes = $request->input('notes');
        $plant->planted_at = $request->input('planted_at');
        $plant->user_id = $request->input('user_id');
        $plant->locations_id = $request->input('locations_id');
        $plant->localType = $request->input('localType');
        $plant->waterOrnot = $request->input('waterOrnot');
        $plant->waterReminder = $request->input('waterReminder');
        $plant->repetitions = $request->input('repetitions');
        $plant->confirmedDelay = $request->input('confirmedDelay');
        $plant->lastWatered = $request->input('lastWatered');
        $plant->save();

        Session::flash('message', "Your plant information has been updated we will send you an email reminding you when to water this plant. ");

        return Redirect::back();


    }

    public function location_delete_plant($id)
    {
        $user_id = Auth::id();
        $locationplant = User::find($user_id)->plants->find($id)->delete();

        Session::flash('message', "The plant has been deleted.");
        return redirect('/locations');
    }


}
