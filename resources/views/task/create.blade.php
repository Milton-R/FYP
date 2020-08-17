@extends('layouts.app')
@section('content')

    <script>
        $(document).ready(function() {
            $("#message").delay(5000)
                .fadeOut('slow');
        });</script>
    <div >

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <H1 class="col-8">Add new task.</H1>
                            <div class="col-4">
                                <a type="button" href="{{ url('/home') }}" class="btn btn-light"> Cancel </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success"
                                     id="message">{{ Session::get('message') }}</div>
                            @endif
                            <form action="/tasks" method="post">
                                @csrf

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <div class="form-group">
                                    <label for="title">Task name</label>
                                    <input type="text" class="form-control" id="taskNamef" name="title"
                                           value={{old('title')}} >
                                    @error('title') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="due_date">Due date</label>
                                    <input type="Date" class="form-control" id="DueDatef"
                                           name="due_Date"
                                           value={{ old('due_Date')}}>
                                    @error('due_Date') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="importance">Priority</label>
                                    <select class="form-control" id="priorityf" name="importance">
                                        <option
                                            value="1" {{old('importance')=="1"? 'selected':''}}>
                                            Normal
                                        </option>
                                        <option
                                            value="2" {{old('importance')=="2"? 'selected':''}}>
                                            Important
                                        </option>
                                        <option
                                            value="3" {{old('importance')=="3"? 'selected':''}}>
                                            Low Priority
                                        </option>
                                    </select>
                                    @error('importance') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                                <input type="hidden" value="1" name="status">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="Description" name="description"
                                              rows="5"
                                              value={{old('description')}}>{{old('description')}}</textarea>
                                    @error('description') <p
                                        style="color:red;">{{$message}}</p>@enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit Task
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
