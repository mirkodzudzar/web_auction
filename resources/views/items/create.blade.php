@extends('layout')

@section('content')
  @section('page_title', 'Publish new item')

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
      <label>Payment method(s)</label><br>
      @foreach ($payments as $payment)
        <input type="checkbox" value="{{ $payment->id }}" name="payments[]" {{ collect(old('payments'))->contains($payment->id) ? 'checked' : '' }}>{{ $payment->name }}<br>
      @endforeach
    </div>
    <div>
      <label>Delivery method(s) *</label><br>
      @foreach ($deliveries as $delivery)
        <input type="checkbox" value="{{ $delivery->id }}" name="deliveries[]" {{ collect(old('deliveries'))->contains($delivery->id) ? 'checked' : '' }}>{{ $delivery->name }}<br>
      @endforeach
    </div>
    <div>
      <label>Category *</label><br>
      @foreach ($categories as $category)
        <input type="radio" value="{{ $category->id }}" name="category" {{ collect(old('category'))->contains($category->id) ? 'checked' : '' }}>{{ $category->name }}<br>
      @endforeach
    </div>
    <div>
      <label for="image">Image</label>
      <input type="file" name="image" id="image">
    </div>

    <button type="submit">Publish item</button>
  </form>
@endsection