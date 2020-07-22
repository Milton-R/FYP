@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="btn btn-primary" href="/locations/create" role="button">add new</a>

        @foreach ($plants as $plant)
            <a href="/locations/{{$plant->id}}">
                <div class="row justify-content-lg-start">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                {{$plant->name}}

                            </div>

                            <div class="card-body">
                                {{$plant->planttype}}

                            </div>

                        </div>
                    </div>
                </div>
            </a>


        @endforeach

    </div>
@endsection
