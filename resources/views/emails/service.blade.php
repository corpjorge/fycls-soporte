@component('mail::message')
# Servicio numero

Tu servicio ha sido creado!

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
