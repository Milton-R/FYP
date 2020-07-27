@component('mail::message')
# Introduction

The body of your message.

Is not going to rain this week or very little soo it would be best to water your plants as usual.

Check your task list as you may have task pending that still need to be done to do this click th button bellow.

@component('mail::button', ['url' => 'http://mygarden/login'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
