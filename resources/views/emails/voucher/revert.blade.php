@component('mail::message')
# Hello {{ $voucher->owner->fullname() }},

Your transaction of &#8358;{{ $voucher->amount }} which was converted to the july flash sales voucher with code <strong>{{ $voucher->name }}</strong> has been reverted to a pending transaction. Click the button below to login and check.

@component('mail::button', ['url' => "/"])
View Transaction
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
