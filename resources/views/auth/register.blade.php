@extends('layout')

@section('content')
  @section('page_title', 'Register')
  <form action="{{ route('register') }}" method="POST">
    @csrf
    <x-errors :errors="$errors"></x-errors>
    @include('includes._user-form')

    <button type="submit">Register</button>
  </form>
@endsection