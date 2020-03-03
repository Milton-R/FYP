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

        <a class="btn btn-primary" href="/locations/{{$location->id}}/edit" role="button">Edit Location</a>
        <a class="btn btn-primary" href="/locations/{{$location->id}}/create_plant" role="button">add plant</a>

            <h1>{{$location->notes}}</h1>
            <button type="submit" class="btn btn-danger" >
                Delete
            </button>
        </form>


        @foreach ($location->plants as $plant)
            <form action="/locations/{{$location->id}}" method="post">
                @method('DELETE')
                @csrf
            <a href="/locations/{{$plant->id}}" >{{$plant-> name}} </a>

                    <div class="row justify-content-lg-start">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    {{$plant->id}}
                                </div>

                                <div class="card-body">
                                    {{$plant->name}}
                                    <button type="submit" class="btn btn-danger" >
                                        Delete
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
        @endforeach




    </div>
@endsection
