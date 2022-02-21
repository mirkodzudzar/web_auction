@extends('layout')

@section('content')
  @section('page_title', 'Login')
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
      <label for="email">Email *</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required>
      <x-error field="email"></x-error>
    </div>
    <div>
      <label for="password">Password *</label>
      <input type="password" name="password" id="password" required>
      <x-error field="password"></x-error>
    </div>

    <button type="submit">Login</button>
</form>
@endsection