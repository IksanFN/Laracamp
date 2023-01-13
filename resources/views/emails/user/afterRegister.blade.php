<x-mail::message>
# Welcome

Hi {{ $user->name }}
<br>
Welcome to Laracamp, your account has been successfully. Now you can choose your best match camp!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

{{-- <x-mail::button :url="">
Login Here
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
