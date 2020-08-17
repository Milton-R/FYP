@extends('layouts.app')

@section('content')

    <script>
        $(document).ready(function () {
            $("#message").delay(5000)
                .fadeOut('slow');
        });</script>

    <div class="container">


        <div class="card">
            @if (Session::has('message'))
                <div class="alert alert-success"
                     id="message">{{ Session::get('message') }}</div>
            @endif
            <div class="card-header row no-gutters">
                <div class="col-xs-12 col-md-8"><h1 style="align-items: center">{{$location->name}}</h1></div>
                <div class="col-xs-6 col-md-2"><a class="btn btn-primary" href="/locations/{{$location->id}}/edit"
                                                  role="button">Edit Location</a></div>
                <div class="col-xs-6 col-md-2">
                    <form action="/locations/{{$location->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete location</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <a class="btn btn-primary col-4" href="/locations/{{$location->id}}/create_plant" role="button">add
                    plant</a>

                @foreach ($plants as $plant)

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card" style="margin:2% 0">
                                <div class="card-header row no-gutters">
                                    <h5 class="col-8">Plant name:{{$plant->name}}</h5>
                                    <a class="btn btn-primary col-4" href="/plants/{{$plant->id}}/edit"
                                       role="button"> View Plant </a>
                                </div>

                                <div style="display: flex; flex: 1 1 auto;">
                                    <div class="img-square-wrapper">
                                        <img src="/storage/location/{{$plant->picture}}" alt=""
                                             style="width:150px; height:150px; float:left;">
                                    </div>
                                    <div class="card-body row card-horizontal">

                                        <div class="card-text col-6">
                                            <span> Type of Plant: {{$plant->plant_type}} </span>
                                        </div>
                                        <div class="card-text col-6">
                                            <span> Date planted: {{$plant->planted_at}} </span></div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="offset-8 col-4 align-self-end ">
                                        <form action="/locations_delete_plant/{{$plant->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"> Delete plants</button>
                                        </form>
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
