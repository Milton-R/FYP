@extends('layout')

<form action="/action_page.php">


        <div class="form-group">
            <label for="taskNamef">Plant Name</label>
            <input type="text" class="form-control" id="taskNamef">
        </div>

        <div class="form-group">
            <label for="DueDatef">Task name Name</label>
            <input type="Date" class="form-control" id="taskNamef">
        </div>

        <div class="form-group">
            <label for="DueDatef">Task name Name</label>
            <input type="Date" class="form-control" id="taskNamef">
        </div>

        <div class="form-group">
            <label for="priorityf">Priority</label>
            <select class="form-control" id="priorityf">
                <option>important </option>
                <option>Normal</option>
                <option>Not Important</option>
            </select>
        </div>


        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" rows="5"></textarea>
        </div>


        <div>
            <label for="datecreated">Date created:</label>
            <input type="date" id="Ldatepickcer" name="datecreated">
        </div>



        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>

</form>
