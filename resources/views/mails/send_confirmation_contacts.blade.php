@component('mail::message')
# Introduction
Heading level 1
===============

@component('mail::panel')
<p><b>Asunto: </b>{{ $contact->subject }}</p>
<p><b>Mensaje: </b>{{ $contact->message }}</p>
@endcomponent

@component('mail::button', ['url' => 'https://google.com'])
Ir a Google
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
