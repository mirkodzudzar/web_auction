@extends('layout')

@section('content')
  @section('page_title', 'Login')
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <x-errors :errors="$errors"></x-errors>
    <div>
      <label for="email">Email *</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    <div>
      <label for="password">Password *</label>
      <input type="password" name="password" id="password" required>
    </div>

    <button type="submit">Login</button>
</form>
@endsection