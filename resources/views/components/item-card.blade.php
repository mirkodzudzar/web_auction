<div>
  @if ($item->image)
    <img src="{{ $item->image->url() }}">
  @endif
  <p>
    @can('view', $item)
      <a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
    @else
      {{ $item->name }}
    @endcan
  </p>
  <p>{{ $item->starting_price }} RSD</p>
  <p>{{ $item->bid_users_count }} bid(s)</p>
  <hr>
</div>