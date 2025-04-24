@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="logo" class="form-label">Logo</label>
  <input type="file" name="logo" id="logo" class="form-control" {{ isset($item) ? '' : 'required' }}>
  @if(isset($item) && $item->logo)
    <img src="{{ Storage::url($item->logo) }}" alt="Current Logo" class="img-thumbnail mt-2" height="80">
  @endif
</div>

<div class="mb-3">
  <label for="order" class="form-label">Display Order</label>
  <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $item->order ?? 0) }}" required>
</div>