@component('mail::message')

You now can reset your password by clicking in this button

@component('mail::button', ['url' => $token])
reset password
@endcomponent

@component('mail::panel')
Don't forgot your password again 
you aren't kid to forget it 😠😠😠
@endcomponent

Thanks,<br>
{{ "ReadAholic" }}
@endcomponent
