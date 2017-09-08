@component('mail::message')
# Hello {{$user->name}},

Your registration refund from Crypto2Naira has been successfully sent to the account details you provided.
The account paid to is specified below:

Bank Name: {{$user->details->bank}}

Account Number: {{$user->details->account_number}}

Account Name: {{ $user->details->name }}

Amount Paid: {{$user->plans->price * 0.6}}

Regards,<br>
{{ config('app.name') }}
@endcomponent
