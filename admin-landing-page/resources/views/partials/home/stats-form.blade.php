@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="count" class="form-label">Count</label>
  <input type="number" name="count" id="count" class="form-control" value="{{ old('count', $item->count ?? 0) }}" required>
</div>

<div class="mb-3">
  <label for="label" class="form-label">Label</label>
  <input type="text" name="label" id="label" class="form-control" value="{{ old('label', $item->label ?? '') }}" required>
</div>