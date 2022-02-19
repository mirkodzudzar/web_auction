@extends('layout')

@section('content')
  @section('page_title', $item->name)
  
  <div>
    @if ($item->image)
      <img src="{{ $item->image->url() }}">
    @endif
    <p>{{ $item->description }}</p>
    <p>Starting price: {{ $item->starting_price }} RSD</p>
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
    @elsecan('cancel_bid', $item)
      <div>
        <p>Your price: {{ $item->bid_users()->where('user_id', Auth::user()->id)->first()->pivot->price }} RSD</p>
        <form action="{{ route('items.cancel_bid', ['item' => $item->id]) }}" method="POST">
          @csrf
          <button type="submit">Cancel your bid</button>
        </form>
      </div>
    @else
      @if ($item->user->id !== Auth::user()->id)
        <p>You have canceled your bid already!</p>
      @endif
    @endcan

    @guest
      <a href="{{ route('login') }}">Login to bid</a>
    @endguest

    @if ($item->payment_method)
      <p>Payment method: {{ $item->payment_method }}</p>
    @endif
    <p>Delivery method: {{ $item->delivery_method }}</p>
    <p>Deadline for buying is: {{ $item->expires_at }}</p>
    <p>
      <a href="{{ route('users.items.index', ['user' => $item->user->id]) }}">{{ $item->user->full_name }}</a>
    </p>
    @can('cancel_item', $item)
      <form action="{{ route('items.cancel_item', ['item' => $item->id]) }}" method="POST">
        @csrf
        <button type="submit">Cancel item</button>
      </form>
    @endcan
    @if ($item->user->id === Auth::user()->id)
      <p>Status: {{ $item->status }}</p>
    @endif
  </div>
  @auth
    @if ($item->user->id === Auth::user()->id)
      <div>
        <h3>Users that already bid for this item</h3>
        <ul>
          @forelse ($item->bid_users as $bid_user)
            {{-- Only active bids will be displayed. --}}
            @php
              $item_user = App\Models\ItemUser::where('item_id', $item->id)
                                              ->where('user_id', $bid_user->id)
                                              ->where('status', 'active')
                                              ->first();
            @endphp
            @if (isset($item_user))
              <li>
                {{ $bid_user->full_name }},
                {{ $bid_user->bid_items()->where('item_id', $item->id)->first()->pivot->price }} RSD
              </li>
            @endif
          @empty
            <p>No users yet.</p>
          @endforelse
        </ul>
      </div>
    @endif
  @endauth
@endsection