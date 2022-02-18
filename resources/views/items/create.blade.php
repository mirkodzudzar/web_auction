@extends('layout')

@section('content')
  <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    
    <div>
      <label for="name">Name *</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>
    <div>
      <label for="description">Description *</label>
      <textarea name="description" id="description" required>{{ old('description') }}</textarea>
    </div>
    <div>
      <label for="starting_price">Starting price *</label>
      <input type="text" name="starting_price" id="starting_price" value="{{ old('starting_price') }}" required>
    </div>
    <div>
      <label for="payment_method">Payment method</label>
      <input type="text" name="payment_method" id="payment_method" value="{{ old('payment_method') }}">
    </div>
    <div>
      <label for="delivery_method">Delivery method *</label>
      <input type="text" name="delivery_method" id="delivery_method" value="{{ old('delivery_method') }}" required>
    </div>
    <div>
      <label for="image">Image</label>
      <input type="file" name="image" id="image">
    </div>

    <button type="submit">Publish item</button>
  </form>
@endsection