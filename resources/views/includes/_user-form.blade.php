<div>
  <label for="first_name">First name *</label>
  <input type="text" name="first_name" id="first_name" value="{{ old('first_name', optional($user ?? null)->first_name) }}" required>
</div>
<div>
  <label for="last_name">Last name *</label>
  <input type="text" name="last_name" id="last_name" value="{{ old('last_name', optional($user ?? null)->last_name) }}" required>
</div>
<div>
  <label for="email">Email *</label>
  <input type="email" name="email" id="email" value="{{ old('email', optional($user ?? null)->email) }}" required>
</div>
<div>
  <label for="password">Password *</label>
  <input type="password" name="password" id="password" required>
</div>
<div>
  <label for="password_confirmation">Password confirm *</label>
  <input type="password" name="password_confirmation" id="password_confirmation" required>
</div>