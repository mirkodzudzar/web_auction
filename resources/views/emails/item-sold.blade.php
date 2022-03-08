@component('mail::message')
# Item '{{ $item->name }}' has been sold!

@component('mail::panel')
## Buyer is {{ $item->buyer->full_name }}, with the final price of {{ $item->final_price }} RSD.

Starting price was {{ $item->starting_price }} RSD.

@component('mail::button', ['url' => route('items.show', ['item' => $item->id])])
See item details
@endcomponent
@endcomponent

Contact the buyer on email: {{ $item->buyer->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
