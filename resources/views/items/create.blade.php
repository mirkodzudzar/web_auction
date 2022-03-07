@extends('layout')

@section('content')
  @section('page_title', 'Publish new item')

  <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <label for="name">Name *</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      <x-error field="name"></x-error>
    </div>
    <div>
      <label for="description">Description *</label>
      <textarea name="description" id="description" required>{{ old('description') }}</textarea>
      <x-error field="description"></x-error>
    </div>
    <div>
      <label for="starting_price">Starting price *</label>
      <input type="text" name="starting_price" id="starting_price" value="{{ old('starting_price') }}" required>
      RSD
      <x-error field="starting_price"></x-error>
    </div>
    <div>
      <label>Payment method(s)</label><br>
      @foreach ($payments as $payment)
        <input type="checkbox" value="{{ $payment->id }}" name="payments[]" {{ collect(old('payments'))->contains($payment->id) ? 'checked' : '' }}>{{ $payment->name }}<br>
      @endforeach
      <x-error field="payments"></x-error>
    </div>
    <div>
      <label>Delivery method(s) *</label><br>
      @foreach ($deliveries as $delivery)
        <input type="checkbox" value="{{ $delivery->id }}" name="deliveries[]" {{ collect(old('deliveries'))->contains($delivery->id) ? 'checked' : '' }}>{{ $delivery->name }}<br>
      @endforeach
      <x-error field="deliveries"></x-error>
    </div>
    <div>
      <label>Category *</label><br>
      @foreach ($categories as $category)
        <input type="radio" value="{{ $category->id }}" name="category" {{ (int) old('category') === $category->id ? 'checked' : '' }}>{{ $category->name }}<br>
      @endforeach
      <x-error field="category"></x-error>
    </div>
    <div>
      <label for="condition">Condition *</label><br>
      @foreach ($conditions as $condition)
        <input type="radio" value="{{ $condition->id }}" name="condition" {{ (int) old('condition') === $condition->id ? 'checked' : '' }}>{{ $condition->name }}<br>
      @endforeach
      <x-error field="condition"></x-error>
    </div>
    <div>
      <label for="image">Image</label>
      <input type="file" name="image" id="image">
      <x-error field="image"></x-error>
    </div>

    <button type="submit">Publish item</button>
  </form>
@endsection