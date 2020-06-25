@section('tasks')
<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

    <div style=" width:50%; margin-left:25%">
    <div class="container" >

        <div id="openweathermap-widget-1"></div>
        <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script><script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 1,cityid: '2643743',appid: '66558235d392bd37f58293db6dd6f887',units: 'metric',containerid: 'openweathermap-widget-1',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>

            <div class="row">
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
                                            <form action="tasks/{{$task->id}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button  style=" display: inline" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger" >
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        <div>
                                            <form action="done_tasks/{{$task->id}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="status" value="2">
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
                                            <form action="tasks/{{$task->id}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        <div>
                                            <form action="todo_tasks/{{$task->id}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="status" value="2">
                                                <button  style=" display: inline" type="submit" class="btn btn" >
                                                    Todo
                                                </button>

                                            </form>
                                        </div>

                                        <div>
                                            <form action="done_tasks/{{$task->id}}" method="post">
                                                @method('PUT')
                                                @csrf
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
                                                <form action="tasks/{{$task->id}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  style=" display: inline" type="submit" class="btn btn-danger" >
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>

                                            <div>
                                                <form action="doing_tasks/{{$task->id}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="status" value="2">
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


@endsection
