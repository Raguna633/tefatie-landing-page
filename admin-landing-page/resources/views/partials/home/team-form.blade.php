@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="position" class="form-label">Position</label>
  <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $item->position ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="photo" class="form-label">Photo</label>
  <input type="file" name="photo" id="photo" class="form-control">
  @if(isset($item) && $item->photo)
    <img src="{{ Storage::url($item->photo) }}" alt="Current Photo" class="img-thumbnail mt-2" height="100">
  @endif
</div>