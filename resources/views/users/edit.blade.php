@extends('layout')

@section('content')
  @section('page_title', "Edit your profile")
  <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')
    @include('includes._user-form')

    <button type="submit">Edit</button>
  </form>
@endsection