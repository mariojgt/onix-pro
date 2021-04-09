@component('mail::message')
# Registration Complete

Please click the button below to verify your email address, this link will expire in 60 minutes.

@component('mail::button', ['url' => $validRoute])
Verify Email Address
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
