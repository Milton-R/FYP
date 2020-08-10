@extends('layouts.app')

@section('content')

    <div class="container">


        <a class="btn btn-primary" href="/plant/{{$plant->id}}/edit" role="button">Edit Plant</a>

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
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

    </div>
@endsection
