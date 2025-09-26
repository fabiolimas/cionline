@component('mail::message')
# Nova Correspondência Recebida

Você recebeu uma nova correspondência de **{{ $ci->funcionario_origem }}**.

**Loja de Origem:** {{ $ci->loja_origem }}
**Loja Destinatário:** {{ $ci->loja_destinatario }}
**Data de Envio:** {{ $ci->data_envio->format('d/m/Y H:i') }}

@component('mail::button', ['url' => route('home')])
Ver Correspondência
@endcomponent

Obrigado,
{{ config('app.name') }}
@endcomponent
