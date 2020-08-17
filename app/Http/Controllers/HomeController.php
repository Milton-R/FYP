<?php

namespace App\Http\Controllers;

use App\User;
use View;
use Session;
use Response;
use Illuminate\Support\Facades\Redirect;
use http\Message;
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

    public function weather()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        $weather = app(WeatherController::class)->local($user->coor);
        $html = View::make('layouts.weatherwidget', compact('weather'))->render();

        return Response::json(['html' => $html]);
    }


    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        $todo_tasks = User::find($user_id)->tasks()->where('status', 1)->get();

        $doing_tasks = User::find($user_id)->tasks()->where('status', 2)->get();

        $done_tasks = User::find($user_id)->tasks()->where('status', 3)->get();

        return view('home', compact('todo_tasks','doing_tasks', 'done_tasks'));

    }

    public function getalltask()
    {
        $user_id = Auth::id();
        $todo_tasks = User::find($user_id)->tasks()->where('status', 1)->get();

        $doing_tasks = User::find($user_id)->tasks()->where('status', 2)->get();

        $done_tasks = User::find($user_id)->tasks()->where('status', 3)->get();

        $html = View::make('layouts.tasks', compact('todo_tasks','doing_tasks', 'done_tasks'))->render();

        return Response::json(['html' => $html]);
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

        Session::flash('message', "Your Tasks has been added to your TODO list and we will send you an email reminding you when its due. ");
        return Redirect::back();
    }

    public function create(){

        $user_id = Auth::id();
        return view('task.create' , compact('user_id'));
    }


    public function updatestatus(Request $request, $id){

        $this->validate($request, [
            'status' => 'required',
        ]);
        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks->find($id);
        $tasks->status = $request->input('status');
        $tasks->save();

    }

    public function edit($id)
    {

        $user_id = Auth::id();
        $task = User::find($user_id)->tasks->find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'title' =>'required',
            'description' =>'required',
            'importance' =>'required',
            'due_Date' =>'required',
            'user_id' => 'required'
        ]);
        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks->find($id);
        $tasks->title = $request->input('title');
        $tasks->description = $request->input('description');
        $tasks->importance = $request->input('importance');
        $tasks->due_Date = $request->input('due_Date');
        $tasks->user_id = $request->input('user_id');
        $tasks->save();

        Session::flash('message', "Your Tasks has been updated and we will send you an email reminding you when its due. ");
        return Redirect::back();

    }

    public function destroy($id){

        $user_id = Auth::id();
        $tasks = User::find($user_id)->tasks->find($id)->delete();
    }


}
