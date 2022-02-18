@extends('layout')

@section('content')
  <div>
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <p>Starting price: {{ $item->starting_price }} RSD</p>
    @if ($item->payment_method)
      <p>Payment method: {{ $item->payment_method }}</p>
    @endif
    <p>Delivery method: {{ $item->delivery_method }}</p>
    <p>Deatline for buying is: {{ $item->expires_at }}</p>
    <i>User: {{ $item->user->email }}</i>
    @can('cancel', $item)
      <form action="{{ route('items.cancel', ['item' => $item->id]) }}" method="POST">
        @csrf
        <button type="submit">Cancel item</button>
      </form>
    @else
      <p>Status: {{ $item->status }}</p>
    @endcan
  </div>
@endsection