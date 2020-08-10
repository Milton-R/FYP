@extends('layouts.app')

@section('content')

    <div class="container">


        <a class="btn btn-primary" href="/locations/{{$location->id}}/edit" role="button">Edit Location</a>
        <a class="btn btn-primary" href="/locations/{{$location->id}}/create_plant" role="button">add plant</a>
        <form action="/location/{{$location->id}}" method="post">
                        @method('DELETE')
                        @csrf
            <button type="submit" class="btn btn-danger" >
                Delete
            </button>
        </form>

        @foreach ($plants as $plant)
            <form action="/locations_delete_plant/{{$plant->id}}" method="post">
                @method('DELETE')
                @csrf
            <a href="/plants/{{$plant->id}}">
                <div class="row justify-content-lg-start">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                               <div>
                                   <p>plant name:{{$plant->name}}</p>
                               </div>
                            </div>
                            <div class="card-body">

                                {{$plant->image}}
                                <button type="submit" class="btn btn-danger" >
                                    Delete
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </a>


            </form>
        @endforeach
    </div>
@endsection
