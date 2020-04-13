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
        $todo_tasks = User::find($user_id)->tasks()->where('status', 1)->get();

        $doing_tasks = User::find($user_id)->tasks()->where('status', 2)->get();

        $done_tasks = User::find($user_id)->tasks()->where('status', 3)->get();

        return view('home', compact('todo_tasks','doing_tasks', 'done_tasks'));

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


        return redirect('home');
    }

    public function create(){

        $user_id = Auth::id();
        return view('task.create' , compact('user_id'));
    }

    public function update($id){

        $data = request()->validate([
            'status' =>'required',
        ]);
        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks->find($id);
        $tasks->update($data);


        return redirect('home');
    }

    public function destroy($id){

        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks->find($id)->delete();
        return  redirect('home');
    }




}
