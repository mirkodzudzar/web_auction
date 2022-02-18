<form action="{{ route('login') }}" method="POST">
  @csrf
  @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
  @endif
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