@extends('layouts.app')
@section('content')
    <div style=" width:50%; margin-left:25%">
        <form action="/tasks" method="post">
            @csrf

            <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
                <label for="name">Task name</label>
                <input type="text" class="form-control" id="taskNamef" name="title">
                @error('taskNamef') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group">
                <label for="DueDatef">Due date</label>
                <input type="Date" class="form-control" id="DueDatef" name="due_Date">
                @error('due_date') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group">
                <label for="priorityf">Priority</label>
                <select class="form-control" id="priorityf" name="importance">
                    <option value="1">Normal </option>
                    <option value="2">Important</option>
                    <option value="3">Low Priority</option>
                </select>
                @error('priorityf') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <input type="hidden" value="1" name="status">

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" body building workioutid="Description"  name="description" rows="5"></textarea>
                @error('description') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add new task</button>
                </div>
            </div>

        </form></div>

@endsection
