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

        <a class="btn btn-primary" href="/addlocation" role="button">add new</a>

        @foreach ($localInGarden as $location)
        <div class="row justify-content-lg-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$location->name}}
                    </div>

                    <div class="card-body">
                        {{$location->notes}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
