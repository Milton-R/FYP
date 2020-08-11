@component('mail::message')
<h1> Hello it looks like its going to rain for most of the weak</h1>

<p>Its going to rain alot so there will be no need to water your outdoor plants this week.</p><br>
<p>We will notify you the next time your plants need to be watered.</p><br>
<p>We will notify you the next time your plants need to be watered.</p><br>

<h3>Check your to-do list as you may have task pending that still need to be done</h3>

@component('mail::button', ['url' => 'http://mygarden/login'])
Take me to my login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
