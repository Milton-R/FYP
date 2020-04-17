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

        <a class="btn btn-primary" href="/locations/create" role="button">add new</a>

        @foreach ($locations as $location)
            <form action="/locations/{{$location->id}}" method="post">
                @method('DELETE')
                @csrf

                    <div class="row justify-content-lg-start">

                        <div class="col-md-8">
                            <div class="card">
                                <a href="/locations/{{$location->id}}" >
                                <div class="card-header">
                                    {{$location->name}}
                                </div>
                                </a>

                                <div class="card-body">
                                    <img src="{{$location->created_at}}" alt="">
                                   <span>  {{$location->name}} </span>
                                    <span>  {{$location->plantType}} </span>
                                    <span>  {{$location->created_at}} </span>

                                </div>

                            </div>
                        </div>
                    </div>
            </form>
        @endforeach
    </div>
@endsection
