@component('mail::message')
You now can verify your account by clicking in this button
@component('mail::button', ['url' => $token])
Verify
@endcomponent

Thanks,<br>
{{ "ReadAholic" }}
@endcomponent
