@component('mail::message')
Hello Travelling Lover,

<div>
Thanks for your inquiry.We've got the request to know the phone number of a local guide <strong>{{ $guide->name }}</strong>. The phone number is: <strong>{{ $guide->phone }}</strong>. Stay with our system to get the information of travelling related Things.
</div>
<br> 
Thanks,<br>
Team {{ config('app.name') }}
@endcomponent
