@extends('layout')

@section('content')
  <div>
    <h1>{{ $item->name }}</h1>
    @if ($item->image)
      <img src="{{ $item->image->url() }}">
    @endif
    <p>{{ $item->description }}</p>
    <p>Starting price: {{ $item->starting_price }}</p>
    @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    
    @can('bid', $item)
      <form action="{{ route('items.bid', ['item' => $item->id]) }}" method="POST">
        @csrf
        <div>
          <label for="price">Your price *</label>
          <input type="text" name="price" id="price" value="{{ old('price') }}" required>

          <button type="submit">Bid</button>
        </div>
      </form>
    @else
      @auth
        @if (Auth::user()->id !== $item->user->id)
          <p>Your price: {{ $item->bid_users()->where('user_id', Auth::user()->id)->first()->pivot->price }}</p>
        @endif
      @else
        <a href="{{ route('login') }}">Login to bid</a>
      @endauth
    @endcan

    @if ($item->payment_method)
      <p>Payment method: {{ $item->payment_method }}</p>
    @endif
    <p>Delivery method: {{ $item->delivery_method }}</p>
    <p>Deadline for buying is: {{ $item->expires_at }}</p>
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