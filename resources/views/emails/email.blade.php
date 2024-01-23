{{-- resources/views/vendor/notifications/email.blade.php --}}

@component('mail::message')
# Welcome to our community, {{ $user->name }}!

Your account has been created by an admin. Here are your login details:

**Email:** {{ $user->email }} <br>
**Password:** {{ $password }}

Thank you for joining our community!

@component('mail::button', ['url' => route('home')])
    Visit Our App
@endcomponent

Regards, <br>
{{ config('app.name') }}
@endcomponent
