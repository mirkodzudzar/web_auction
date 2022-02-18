@extends('layout')

@section('content')
  <form action="{{ route('register') }}" method="POST">
    @csrf
    @if($errors->any())
      {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    @include('includes._user-form')

    <button type="submit">Register</button>
  </form>
@endsection