<div>
  @if ($item->image)
    <img src="{{ $item->image->url() }}">
  @endif
  <p>
    @if (isset($link) && $link === false)
      {{ $item->name }}
    @else
      <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
    @endif
  </p>
  <p>{{ $item->starting_price }} RSD</p>
  <p>{{ $item->bid_users->count() }} bid(s)</p>
  <hr>
</div>