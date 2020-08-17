@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card row no-gutters">
            <div class="card-header row no-gutters">
                <div class="col-md-8"><h1>All your plants</h1></div>
                <div class="col-md-4"><a class="btn btn-primary" href="/locations" role="button">add new plant</a></div>

            </div>
            <div class="card-body">

                <div class="card-deck">
                    @foreach ($plants as $plant)

                        <div class="card col-md-4">
                            <a href="/locations/{{$plant->locations_id}}">
                                <img class="card-img-top" src="/storage/location/{{$plant->picture}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"> {{$plant->name}}</h5>
                                    <p class="card-text"><span>Plant type:{{$plant->plant_type}}.</span></p>
                                    <p class="card-text"><span>Last time watered:{{$plant->lastwaterd}}</span></p>
                                    <p class="card-text"><span>when to water next:{{$plant->waterReminder}}</span></p>
                                </div>
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>



        </div>


    </div>
@endsection
