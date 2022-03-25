@component('mail::message')
<h1>Hi</h1>
You are receiving this email because a password reset was requested for your account.

please open this link:
{{$url}}

If you did not request this reset, ignore this message.

Thanks,<br>
Coding Leader Team
@endcomponent
