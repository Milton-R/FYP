
<div class="row justify-content-center">
        @foreach($weather as $forcast)
            <div class="card col-2">
                <img class="card-img-top" src="https://www.metaweather.com//static/img/weather/{{$forcast->weather_state_abbr}}.svg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$forcast->applicable_date}} </h4>
                    <h5 class="card-text">{{$forcast->weather_state_name}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Avg Temp:{{number_format($forcast->the_temp,0)}}C°</li>
                    <li class="list-group-item">Max Temp:{{number_format($forcast->max_temp,0)}}C°</li>
                    <li class="list-group-item">Min Temp:{{number_format($forcast->min_temp,0)}}C°</li>
                </ul>
            </div>

        @endforeach
</div>
