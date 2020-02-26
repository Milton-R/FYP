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

        @foreach ($locations as $location)
            <a href="/locations/{{$location->id}}" >{{$location-> name}} </a>
{{--            @foreach ($location->location as $local)--}}
{{--        <div class="row justify-content-lg-start">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        {{$local->id}}--}}
{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        {{$local->name}}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            @endforeach--}}
        @endforeach

    </div>
@endsection
