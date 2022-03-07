<div>
  <label for="first_name">First name *</label>
  <input type="text" name="first_name" id="first_name" value="{{ old('first_name', optional($user ?? null)->first_name) }}" required>
  <x-error field="first_name"></x-error>
</div>
<div>
  <label for="last_name">Last name *</label>
  <input type="text" name="last_name" id="last_name" value="{{ old('last_name', optional($user ?? null)->last_name) }}" required>
  <x-error field="last_name"></x-error>
</div>
<div>
  <label for="email">Email *</label>
  <input type="email" name="email" id="email" value="{{ old('email', optional($user ?? null)->email) }}" required>
  <x-error field="email"></x-error>
</div>
@if (Route::is('register'))
  <div>
    <label for="password">Password *</label>
    <input type="password" name="password" id="password" required>
    <x-error field="password"></x-error>
  </div>
  <div>
    <label for="password_confirmation">Password confirm *</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>
  </div>
@elseif (Route::is('users.edit'))
  <div>
    <label for="current_password">Current password</label>
    <input type="password" name="current_password" id="current_password">
    <x-error field="current_password"></x-error>
  </div>
  <div>
    <label for="password">New password</label>
    <input type="password" name="password" id="password">
    <x-error field="password"></x-error>
  </div>
  <div>
    <label for="password_confirmation">Password confirm</label>
    <input type="password" name="password_confirmation" id="password_confirmation">
  </div>
@endif