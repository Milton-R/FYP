@extends('layout')

<form action="/action_page.php">


        <input type="hidden" value="{{ Auth::user()->id }}">

        <div class="form-group">
            <label for="taskNamef">Plant Name</label>
            <input type="text" class="form-control" id="taskNamef">
        </div>


        <div class="form-group">
            <label for="DueDatef">Task name Name</label>
            <input type="Date" class="form-control" id="DueDatef">
        </div>

    <div class="form-group">
        <label for="priorityf">Priority</label>
        <select class="form-control" id="priorityf">
            <option value="1">Normal </option>
            <option value="2">Important</option>
            <option value="3">Low Priority</option>
        </select>
    </div>

        <input type="hidden" value="1" name="status">


        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" rows="5"></textarea>
        </div>


        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Add new task</button>
            </div>

</form>
