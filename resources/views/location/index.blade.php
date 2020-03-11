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
            <a href="/locations/{{$location->id}}" >{{$location-> name}} </a>
                    <div class="row justify-content-lg-start">

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    {{$location->id}}
                                </div>

                                <div class="card-body">
                                    {{$location->name}}
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
        @endforeach
    </div>
@endsection
