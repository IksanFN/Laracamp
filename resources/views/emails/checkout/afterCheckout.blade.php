<x-mail::message>
# Register camp: {{ $checkout->Camp->title }}

Hi, {{ $checkout->User->name }}
<br>
Thank you for register on <b>{{ $checkout->Camp->title }}</b>, please see payment instruction by click the button below

@component('mail::button', ['url' => route('dashboard')])
    My Dashboard
@endcomponent

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
