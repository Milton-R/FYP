
    <div id="todorow" class="row">
        <div class="card col-4" style=" margin-top:10%; ">
            <div class="card-header">
                <h3>To-do</h3>
                <a class="btn btn-primary" href="/tasks/create" role="button">add new</a>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($todo_tasks as $task)
                    <li class="list-group-item">
                        <div class="card-body">

                            <p style="display: inline-flex">{{$task->title}}</p>

                            <div class="dropdown">
                                <button class="dropbtn">Dropdown</button>
                                <div class="dropdown-content">
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="doingstatus"  action="doing_tasks/{{$task->id}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden"  name="status" value="2">
                                            <button style=" display: inline" type="submit" class="btn btn" >
                                                Doing
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card col-4" style=" margin-top:10%; ">
            <div class="card-header">
                <h3>Doing:</h3>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($doing_tasks as $task)
                    <li class="list-group-item">
                        <div class="card-body">
                            <p style="display: inline-flex">{{$task->title}}</p>
                            <div class="dropdown">
                                <button class="dropbtn">Dropdown</button>
                                <div class="dropdown-content">
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form  id="todostatus" action="todo_tasks/{{$task->id}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <p type="hidden" class="taskid" value="{{$task->id}}" ></p>
                                            <input type="hidden" name="status" value="1">
                                            <button  style=" display: inline" type="submit" class="btn btn" >
                                                Todo
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="donestatus" action="done_tasks/{{$task->id}}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <p type="hidden" class="taskid" value="{{$task->id}}" ></p>
                                            <input type="hidden" name="status" value="3">
                                            <button  style=" display: inline" type="submit" class="btn btn" >
                                                Done
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card col-4" style=" margin-top:10%; ">
            <div class="card-header">
                <h3>Done:</h3>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($done_tasks as $task)
                    <li class="list-group-item">
                        <div class="card-body">
                            <p style="display: inline-flex">{{$task->title}}</p>
                            <div class="dropdown">
                                <button class="dropbtn">Dropdown</button>
                                <div class="dropdown-content">
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="doingstatus"  action="doing_tasks/{{$task->id}}" method="post">
                                            @method('PUT')
                                            @csrf

                                            <input type="hidden"  name="status" value="2">
                                            <button  style=" display: inline" type="submit" class="btn btn" >
                                                Doing
                                            </button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>

