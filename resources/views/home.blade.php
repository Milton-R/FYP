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

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
