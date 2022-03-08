@component('mail::message')
# Item '{{ $item->name }}' has expired!

@component('mail::panel')
## There were no users that bid on this item.

Starting price was {{ $item->starting_price }} RSD.

@component('mail::button', ['url' => route('items.show', ['item' => $item->id])])
See item details
@endcomponent
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
