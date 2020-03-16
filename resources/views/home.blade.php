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


            <div class="row">
                <div class="card col-4" style=" margin-top:10%; ">
                    <div class="card-header">
                        TODO:
                        <a class="btn btn-primary" href="/tasks/create" role="button">add new</a>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($tasks as $task)
                        <form action="tasks/{{$task->id}}" method="post">
                            @method('DELETE')
                            @csrf
                        <li class="list-group-item">
                            <div class="card-body">
                                <p style="display: inline-flex">{{$task->title}}</p>
                                <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                    Delete
                                </button>
                            </div>
                        </li>
                            @endforeach
                            <li class="list-group-item">
                                <div class="card-body">
                                    some nonesense
                                    <button type="submit" class="btn btn-danger" >
                                        Delete
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="card-body">
                                    some nonesense
                                    <button type="submit" class="btn btn-danger" >
                                        Delete
                                    </button>
                                </div>
                            </li>
                        </form>
                    </ul>
                </div>

                <div class="card col-4" style=" margin-top:10%; ">
                    <div class="card-header">
                        Featured
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>

                <div class="card col-4" style=" margin-top:10%; ">
                    <div class="card-header">
                        Featured
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>



    </div>



@endsection
