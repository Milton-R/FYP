@extends('layouts.app')

<div class="container">
    <h2>Modal Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
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
                                <option value="1">Normal</option>
                                <option value="2">Important</option>
                                <option value="3">Low Priority</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea class="form-control" id="Description" rows="5"></textarea>
                        </div>


                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Add new task</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
