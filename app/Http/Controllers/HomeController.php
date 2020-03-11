<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks;

        return view('home', compact('tasks'));

    }

    public function store(){

        $data = request()->validate([
            'title' =>'required',
            'description' =>'required',
            'importance' =>'required',
            'status' =>'required',
            'due_Date' =>'required',
            'user_id' => 'required'

        ]);
        \App\Tasks::create($data);


        return redirect()->back();
    }

    public function create(){

        $user_id = Auth::id();
        return view('task.create' , compact('user_id'));
    }



}
