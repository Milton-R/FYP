@component('mail::message')
<h1> Hello I looks like its not going to rain for the next 6 days</h1><br>

<p>Better water your plants as scheaduled</p><br>

<p>We will notify you the next time your plants need to be watered.</p><br>

<h3>Check your To-Do list as you may have task pending that still need to be done by clicking the button bellow.</h3>

@component('mail::button', ['url' => 'http://mygarden/login'])
Take me to my login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
