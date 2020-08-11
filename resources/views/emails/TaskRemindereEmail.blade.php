@component('mail::message')
    <h1>Task Due!</h1>

<table style="width:100%">
    <tr>
        <th><h3>task due:</h3></th>
        <th><h3>Due date:</h3></th>
        <th><h3>Description:</h3></th>
    </tr>
    <tr>
        <td><h4>{{$task->title}}</h4></td>
        <td><h4>{{$task->due_Date}}</h4></td>
        <td><h4>{{$task->description}}</h4></td>

    </tr>
</table>

@component('mail::button', ['url' => 'http://mygarden/login'])
    Take me to my login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
