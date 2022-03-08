@component('mail::message')
# You have bought item '{{ $item->name }}'!

@component('mail::panel')
## Final price is {{ $item->final_price }} RSD.

Starting price was {{ $item->starting_price }} RSD.

@component('mail::button', ['url' => route('items.show', ['item' => $item->id])])
See item details
@endcomponent
@endcomponent

Contact the user that has sold this item, email: {{ $item->user->email }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
