@if ($errors->has($field))
  <div class="text-danger">
    <small>{{ $errors->first($field) }}</small>
  </div>
@endif