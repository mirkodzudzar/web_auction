<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web auction</title>
    </head>
    <body>
      <div>
        <a href="#">Home</a>
        @guest
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
        @else
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
          <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
            @csrf
          </form>
        @endguest
      </div>
      <div>
        @yield('content')
      </div>
    </body>
</html>
