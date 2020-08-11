@component('mail::message')
    <h1>Watering Reminder</h1>
<table style="width:100%">
    <tr>
        <th><h3>Plant location:</h3></th>
        <th><h3>Plant To be watered:</h3></th>
        <th><h3>Last watered day:</h3></th>
        <th><h3>Next watering date:</h3></th>
    </tr>
    <tr>
        <td><h4>{{$plantLocation}}</h4></td>
        <td><h4>{{$plantToWater->name}}</h4></td>
        <td><h4>{{$plantToWater->lastWatered}}</h4></td>
        <td><h4>{{$plantToWater->waterReminder}}</h4></td>
    </tr>
</table>

    @component('mail::button', ['url' => 'http://mygarden/login'])
    Take me to my login
    @endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
