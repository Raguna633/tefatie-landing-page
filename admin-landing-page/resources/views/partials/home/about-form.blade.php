@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="subtitle" class="form-label">Icon (Bootstrap icon class)</label>
  <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon', $item->icon ?? '') }}">
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $item->description ?? '') }}</textarea>
</div>