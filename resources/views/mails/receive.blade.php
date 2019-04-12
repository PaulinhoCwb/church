@component('mail::message')
# Prezado(a) {{ $name }}

Recebemos sua mensagem, em breve entraremos em contato.

@component('mail::panel')
 Mensagem enviada pelo sistema, favor não responder.
@endcomponent

Obrigado(a),<br>
{{ config('app.name') }}
@endcomponent
