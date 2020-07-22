@extends('layouts.app')

@section('content')

    <div class="container">

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
                                  <p>Location name: {{$location->name}}</p>
                                </div>

                                <div class="card-body">

                                    <img src="/storage/location/{{$location->picture}}" alt="" style="width:150px; height:150px; float:left;" >

                                    <span>  {{$location->plantType}} </span>
                                    <span>  {{$location->created_at}} </span>

                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </form>
        @endforeach
    </div>
@endsection
