@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header"><h1 style="align-items: center">Your Locations</h1></div>
                <div class="card-body">
                    <a class="btn btn-primary" href="/locations/create" role="button">add new</a>

                    @foreach ($locations as $location)

                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="card" style="margin:2% 0">
                                        <div class="card-header row no-gutters">
                                            <h5 class="col-8">Location name: {{$location->name}}</h5>
                                            <a class="btn btn-primary col-4" href="/locations/{{$location->id}}"
                                               role="button"> View Location </a>
                                        </div>

                                        <div style="display: flex; flex: 1 1 auto;">
                                            <div class="img-square-wrapper">
                                                <img src="/storage/location/{{$location->picture}}" alt=""
                                                     style="width:150px; height:150px; float:left;">
                                            </div>
                                            <div class="card-body row card-horizontal">

                                                <div class="card-text col-6">
                                                    <span> Type of plants planted: {{$location->plantType}} </span>
                                                </div>
                                                <div class="card-text col-6">
                                                    <span> Date created: {{$location->location_created_at}} </span></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                </div>
        </div>


    </div>
@endsection
