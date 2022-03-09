<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/a615d0ecba.js" crossorigin="anonymous"></script>
        <title>Web auction</title>
    </head>
    <body>
      <nav>
        <a href="{{ route('items.index') }}">Web auction</a>      
        <div>
          <select name="category" onchange="location = this.value;">
            <option selected>-- Categories --</option>
            @foreach ($categories as $category)
              <option value="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</option>
            @endforeach
          </select>

          <form action="{{ route('items.search') }}" method="GET">
            <input type="text" name="search" value="{{ $result ?? '' }}" required>
            <button type="submit">Search</button>
            <x-error field="search"></x-error>
          </form>

          <ul>
            @guest
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            @else
              <li><a href="{{ route('users.edit', ['user' => Auth::user()->id]) }}">Edit profile</a></li>
              <li><a href="{{ route('items.create') }}">Add item</a></li>
              <li><a href="{{ route('users.items.index', ['user' => Auth::user()->id]) }}">Your items</a></li>
              <li><a href="{{ route('users.items.bought', ['user' => Auth::user()->id]) }}">Bought items</a></li>
              <li><a href="{{ route('users.items.sold', ['user' => Auth::user()->id]) }}">Sold items</a></li>
              <li><a href="{{ route('users.comments', ['user' => Auth::user()->id]) }}">Comments about you</a></li>
              <li><a href="{{ route('users.notifications', ['user' => Auth::user()->id]) }}">Notifications</a></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a></li>
              <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                @csrf
              </form>
            @endguest
          </ul>
        </div>
      </nav>

      <div>
        <h1>
          @yield('page_title')
        </h1>
        @if (session('status'))
          <div>
            {{ session('status') }}
          </div>
        @endif
        
        @yield('content')
      
      </div>

      @yield('scripts')
    </body>
</html>
