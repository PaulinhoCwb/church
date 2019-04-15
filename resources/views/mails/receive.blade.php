@component('mail::message')
# Prezado(a),<br>
{{ $name }}

Recebemos sua mensagem, em breve entraremos em contato.

@component('mail::panel')
 Mensagem enviada pelo sistema, favor não responder.
@endcomponent

Obrigado(a),<br>
{{ config('app.name') }}
@endcomponent
