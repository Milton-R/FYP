<div id="todorow" class="row">
    <div class="card col-xs-12 col-md-4 " style=" margin-top:10%; padding: 0 ">
        <div class="card-header row no-gutters">
            <div   class="col-8"> <h3>To-do:</h3></div>
           <div col-2><a class="btn btn-primary" href="/tasks/create" role="button">add new</a></div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($todo_tasks as $task)
                <li class="list-group-item" style="padding:0">
                    <div class="card" style="margin:5px;">
                        <div class="card-title">
                            <h5 style="display: inline-flex">Task: {{$task->title}}</h5>
                        </div>
                        <div class="card-footer">

                            <div class="dropdown">
                                <button class="dropbtn">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                         class="bi bi-three-dots-vertical" fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                </button>
                                <div class="dropdown-content">
                                    <div>
                                        <a class="btn btn-primary" href="tasks/{{$task->id}}/edit" role="button">View Task</a>
                                    </div>
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button style=" display: inline" type="submit"
                                                    class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="doingstatus" action="doing_tasks/{{$task->id}}"
                                              method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <button style=" display: inline" type="submit" class="btn btn">
                                                Doing
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>

    <div class="card col-xs-12 col-md-4 " style=" margin-top:10%; padding: 0 ">
        <div class="card-header">
            <h3>Doing:</h3>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($doing_tasks as $task)
                <li class="list-group-item" style="padding:0">
                    <div class="card" style="margin:5px;">
                        <div class="card-title">
                            <h5 style="display: inline-flex">Task: {{$task->title}}</h5>
                        </div>
                        <div class="card-footer">
                            <div class="dropdown">
                                <button class="dropbtn"> <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                              class="bi bi-three-dots-vertical" fill="currentColor"
                                                              xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg></button>
                                <div class="dropdown-content">
                                    <div>
                                        <a class="btn btn-primary" href="/tasks/{{$task->id}}/edit" role="button">View Task</a>
                                    </div>
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button style=" display: inline" type="submit"
                                                    class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form id="todostatus" action="todo_tasks/{{$task->id}}"
                                              method="post">
                                            @method('PUT')
                                            @csrf
                                            <p type="hidden" class="taskid" value="{{$task->id}}"></p>
                                            <input type="hidden" name="status" value="1">
                                            <button style=" display: inline" type="submit" class="btn btn">
                                                Todo
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="donestatus" action="done_tasks/{{$task->id}}"
                                              method="post">
                                            @method('PUT')
                                            @csrf
                                            <p type="hidden" class="taskid" value="{{$task->id}}"></p>
                                            <input type="hidden" name="status" value="3">
                                            <button style=" display: inline" type="submit" class="btn btn">
                                                Done
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>

    <div class="card col-xs-12 col-md-4 " style=" margin-top:10%; padding: 0 ">
        <div class="card-header">
            <h3>Done:</h3>
        </div>

        <ul class="list-group list-group-flush">
            @foreach($done_tasks as $task)
                <li class="list-group-item" style="padding:0;">
                    <div class="card" style="margin:5px;">
                        <div class="card-title">
                            <h5 style="display: inline-flex">Task: {{$task->title}}</h5>
                        </div>
                        <div class="card-footer">
                            <div class="dropdown">
                                <button class="dropbtn"> <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                              class="bi bi-three-dots-vertical" fill="currentColor"
                                                              xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg></button>
                                <div class="dropdown-content">
                                    <div>
                                        <a class="btn btn-primary" href="/tasks/{{$task->id}}/edit" role="button">View Task</a>
                                    </div>
                                    <div>
                                        <form class="deletetask" action="tasks/{{$task->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button style=" display: inline" type="submit"
                                                    class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <div>
                                        <form class="doingstatus" action="doing_tasks/{{$task->id}}"
                                              method="post">
                                            @method('PUT')
                                            @csrf

                                            <input type="hidden" name="status" value="2">
                                            <button style=" display: inline" type="submit" class="btn btn">
                                                Doing
                                            </button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
</div>
