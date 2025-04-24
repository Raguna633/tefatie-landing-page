@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="subtitle" class="form-label">Subtitle</label>
  <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $item->subtitle ?? '') }}">
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $item->description ?? '') }}</textarea>
</div>