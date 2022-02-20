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
      @auth
        @if ($item->user->id !== Auth::user()->id)
          <p>You have canceled your bid already!</p>
        @endif
      @endauth
    @endcan

    @guest
      <a href="{{ route('login') }}">Login to bid</a>
    @endguest

    @if ($item->payments->count() > 0)
      <p>Payment method(s): 
        @foreach ($item->payments as $payment)
          {{ $payment->name }}{{ $loop->last ? '' : ', ' }}
        @endforeach  
      </p>
    @endif

    <p>Delivery method(s):
      @foreach ($item->deliveries as $delivery)
        {{ $delivery->name }}{{ $loop->last ? '' : ', ' }}
      @endforeach
    </p>

    @if ($item->status === 'active')
      @php
        $days = \Carbon\Carbon::parse($item->expires_at)->diffInDays(\Carbon\Carbon::now());
        $hours = \Carbon\Carbon::parse($item->expires_at)->diffInHours(\Carbon\Carbon::now());
        $minutes = \Carbon\Carbon::parse($item->expires_at)->diffInMinutes(\Carbon\Carbon::now());
      @endphp
      <p>Auction will end in: {{ $days !== 0 ? "$days day(s)" : ($hours !== 0 ? "$hours hour(s)" : "$minutes minute(s)") }}</p>
    @else
      @auth
        @if ($item->user->id === Auth::user()->id)
          <p>Status: {{ $item->status }}</p>
        @endif
      @endauth
    @endif

    <p>Category: 
      <a href="{{ route('categories.show', ['category' => $item->category->id]) }}">{{ $item->category->name }}</a>
    </p>

    <p>
      <a href="{{ route('users.items.index', ['user' => $item->user->id]) }}">{{ $item->user->full_name }}</a>
    </p>
    @can('cancel_item', $item)
      <form action="{{ route('items.cancel_item', ['item' => $item->id]) }}" method="POST">
        @csrf
        <button type="submit">Cancel item</button>
      </form>
    @endcan
  </div>
  @auth
    @if ($item->user->id === Auth::user()->id)
      <div>
        <h3>Users that bid for this item</h3>
        @if ($item->bid_users->count() > 0)
          <ul>
            @foreach ($item->bid_users as $bid_user)
              {{-- Only active bids will be displayed. --}}
              @php
                $item_user = App\Models\ItemUser::where('item_id', $item->id)
                                                ->where('user_id', $bid_user->id)
                                                ->where('status', 'active')
                                                ->first();
              @endphp
              @if (isset($item_user))
                <li>
                  <a href="{{ route('users.items.index', ['user' => $bid_user->id]) }}">{{ $bid_user->full_name }}</a>,
                  {{ $bid_user->bid_items()->where('item_id', $item->id)->first()->pivot->price }} RSD
                  @if ($item->status === 'sold' && $item->buyer->id === $bid_user->id)
                    - bought this item!
                  @endif
                </li>
              @endif
            @endforeach
          </ul>
        @else
          <p>No users yet.</p>
        @endif
      </div>
    @endif
  @endauth
@endsection