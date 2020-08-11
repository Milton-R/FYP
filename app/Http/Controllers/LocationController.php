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
    public function index()
    {

        $user_id = Auth::id();
        $locations = User::find($user_id)->locations;
        return view('location.index', compact('locations'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'plantType' => 'required_without:otherType',
            'otherType' => 'nullable',
            'locationType' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,max:500',
            'notes' => 'nullable',
            'created_at' => 'required'
        ]);

        if ($fileNameWithExt = $request->file('picture')->getClientOriginalName()) {
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $locationimage = $request->file('picture')->getClientOriginalExtension();
            $imageNameToStore = $filename . '_' . time() . '.' . $locationimage;
            $path = $request->file('picture')->storeAs('public/location', $imageNameToStore);
        } else {
            $imageNameToStore = 'noimage.jpg';
        }

        $location = new \App\Locations;
        $location->user_id = $request->input('user_id');
        $location->name = $request->input('name');
        $location->plantType = $request->input('plantType');
        $location->otherType = $request->input('otherType');
        $location->locationType = $request->input('locationType');
        $location->picture = $imageNameToStore;
        $location->notes = $request->input('notes');
        $location->created_at = $request->input('created_at');
        $location->save();


        return redirect('/locations');
    }

    public function show($id)
    {

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        $plants = $location->plants;
        return view('location.show', compact('location', 'plants'));
    }

    public function edit($id)
    {

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        return view('location.edit', compact('location'));

    }

    public function create()
    {

        $user_id = Auth::id();
        return view('location.create', compact('user_id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'plantType' => 'required_without:otherType',
            'otherType' => 'nullable',
            'locationType' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,max:500',
            'notes' => 'nullable',
            'created_at' => 'required'
        ]);


        if ($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $locationimage = $request->file('picture')->getClientOriginalExtension();
            $imageNameToStore = $filename . '_' . time() . '.' . $locationimage;
            $path = $request->file('picture')->storeAs('public/location', $imageNameToStore);
        }

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        $location->user_id = $request->input('user_id');
        $location->name = $request->input('name');
        $location->plantType = $request->input('plantType');
        $location->otherType = $request->input('otherType');
        $location->locationType = $request->input('locationType');
        if ($request->hasFile('picture')) {
            $location->picture = $imageNameToStore;
        }

        $location->notes = $request->input('notes');
        $location->created_at = $request->input('created_at');
        $location->save();



        return redirect('/locations');


    }

    public function destroy($id)
    {

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id)->delete();
        return redirect('/locations');
    }


    public function location_create_plant($id)
    {

        $user_id = Auth::id();
        $location = User::find($user_id)->locations->find($id);
        return view('plant.create', compact('location'));
    }

    public function location_store_plant()
    {

        $data = request()->validate([
            'name' => 'required',
            'amount' => 'required',
            'plant_type' => 'required',
            'picture' => 'nullable',
            'notes' => 'required',
            'planted_at' => 'required',
            'user_id' => 'required',
            'locations_id' => 'required',
            'localType'=>'required',
            'waterOrnot'=>'nullable',
             'waterReminder'=>'required',
            'repetions'=> 'required',
            'confirmedDelay'=>'required',
            'lastWatered'=>'nullable',
        ]);

        Plants::create($data);

        return redirect('/locations');


    }

    public function location_delete_plant($id)
    {

        $user_id = Auth::id();
        $locationplant = User::find($user_id)->plants->find($id)->delete();
        return redirect('/locations');
    }


}
