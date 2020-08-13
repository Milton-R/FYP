@component('mail::message')
    <h1>Ergent Watering is needed! </h1>
<table style="width:100%">
    <tr>
        <th><h3>Plant location:</h3></th>
        <th><h3>Plant To be watered:</h3></th>
        <th><h3>Date to water:</h3></th>
        <th><h3>Next watering date:</h3></th>
    </tr>
    <tr>
        <td><h4>{{$location}}</h4></td>
        <td><h4>{{$plantToWater->name}}</h4></td>
        <td><h4>{{$plantToWater->lastWatered}}</h4></td>
        <td><h4>{{$plantToWater->waterReminder}}</h4></td>
    </tr>
</table>

    <H4>This Plant has not been watered for a longer then {{$plantToWater->repetion}} So we advice that you water it today.</H4>
    <br>
    <H4>If you can not water your plant today please sign in to our account and update the date that you would like to water your plant</H4>

    @component('mail::button', ['url' => 'http://mygarden/login'])
    Take me to my login
    @endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
