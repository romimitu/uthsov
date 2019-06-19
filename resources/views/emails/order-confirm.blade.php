@component('mail::message')
# Dear {{$order->customer_name}}

	Your order has been submitted successfully.

@component('mail::button', ['url' => 'http://uthsov.com/order/'.$order->id])
View Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
