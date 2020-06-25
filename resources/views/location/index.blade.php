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
                                    {{$location->name}}
                                </div>
                                </a>

                                <div class="card-body">
                                    <img src="/uploads/location/{{$location->image}}" alt="" style="width:150px; height:150px; float:left;" >
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
