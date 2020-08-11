@component('mail::message')
    <h1> Hello I looks like it might rain to rain in the next 6 days</h1><br>

    <p>Better water your plants as scheaduled but be aware that some plants might get their next watering date delayed.</p><br>

    <p>We will notify you the next time your plants need to be watered.</p><br>

    <h3>Check your To-Do list as you may have task pending that still need to be done by clicking the button bellow.</h3>

@component('mail::button', ['url' => 'http://mygarden/login'])
    Take me to my login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
