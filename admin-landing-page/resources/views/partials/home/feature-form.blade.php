@csrf
@if(isset($item))
  @method('PUT')
@endif

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $item->description ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label for="button_text" class="form-label">Button Text</label>
  <input type="text" name="button_text" id="button_text" class="form-control" value="{{ old('button_text', $item->button_text ?? '') }}">
</div>