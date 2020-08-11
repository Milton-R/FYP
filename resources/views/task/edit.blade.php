@extends('layouts.app')
@section('content')

    <script>
        $(document).ready(function() {
            $("#message").delay(5000)
                .fadeOut('slow');
        });</script>
    <div style=" width:50%; margin-left:25%">

        @if (Session::has('message'))
            <div class="alert alert-success" id="message">{{ Session::get('message') }}</div>
        @endif
        <form action="/tasks/{{$task->id}}" method="post">
            @method('PUT')
            @csrf

            <input type="hidden"  name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group">
                <label for="title">Task name</label>
                <input type="text" class="form-control" id="taskNamef" name="title" value={{$task->title}} >
                @error('title') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group">
                <label for="due_date">Due date</label>
                <input type="Date" class="form-control" id="DueDatef" name="due_Date" value={{ $task->due_date}}>
                @error('due_date') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group">
                <label for="importance">Priority</label>
                <select class="form-control" id="priorityf" name="importance">
                    <option value="1" {{old('importance',$task->importance)=="1"? 'selected':''}}>Normal </option>
                    <option value="2" {{old('importance',$task->importance)=="2"? 'selected':''}}>Important</option>
                    <option value="3" {{old('importance',$task->importance)=="3"? 'selected':''}}>Low Priority</option>
                </select>
                @error('importance') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <input type="hidden" value="1" name="status" >

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" body building workioutid="Description"  name="description" rows="5"  value={{ $task->description }}></textarea>
                @error('description') <p style="color:red;">{{$message}}</p>@enderror
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add new task</button>
                </div>
            </div>

        </form></div>

@endsection
