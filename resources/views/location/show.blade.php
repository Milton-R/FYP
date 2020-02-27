@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="flex-center position-ref full-height">
            <div class="top-right links">

                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/locations') }}">Location</a>
                <a href="{{ url('/plants') }}">Plants</a>
                <a href="{{ url('/tasks') }}">Task</a>
            </div>
        </div>

        <h1>{{$location}}</h1>


        <a class="btn btn-primary" href="/" role="button">Delete</a>



    </div>
@endsection
