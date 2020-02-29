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

        <a class="btn btn-primary" href="/locations/{{$location->id}}/edit" role="button">add new</a>

        <form action="/locations/{{$location->id}}" method="post">
            @method('DELETE')
            @csrf
            <h1>{{$location}}</h1>
            <button type="submit" class="btn btn-danger" >
                Delete
            </button>
        </form>





    </div>
@endsection
