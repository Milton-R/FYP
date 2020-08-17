@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function () {
            $.get("/weatherhome", function (data) {
                $("#weatherwidget").empty();
                $("#weatherwidget").append(data['html']);
            });
        });
    </script>

        <div id="ako" class="container" >

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

            <div id="weatherwidget" class="col-12"></div>
        </div>

        <div id="taskBars" class="container">
            @include('layouts.tasks')
        </div>

    </div>






@endsection
