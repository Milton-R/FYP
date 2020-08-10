<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nature\Plant;

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
        $plant = Plant::find($id);
        return view('plant.edit' , compact('plant'));
    }

    public function create(){
        $user_id = Auth::id();
        return view('plant.create' , compact('user_id'));
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

        return redirect('/plants');


    }
    public function destroy($id){
        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id)->delete();
        return  redirect('/plants');
    }

}
