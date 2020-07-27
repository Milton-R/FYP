@component('mail::message')
# Introduction

The body of your message.
Its going to rain today so there will be no need to water your outdoor plants this week.

We will notify you the next time your plants need to be watered.

Check your to-do list as you may have task pending that still need to be done

@component('mail::button', ['url' => 'http://mygarden/login'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
