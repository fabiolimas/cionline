@component('mail::message')
# Nova Correspondência Recebida

Você recebeu uma nova correspondência de **{{ $ci->funcionario_origem }}**.

**Data de Envio:** {{ $ci->data_envio->format('d/m/Y H:i') }}

@component('mail::button', ['url' => route('funcionario')])
Ver Correspondência
@endcomponent

Obrigado,
{{ config('app.name') }}
@endcomponent
