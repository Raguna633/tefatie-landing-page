@csrf
@if (isset($item) && $item)
    @method('PUT')
@endif

<div class="mb-3">
    <label class="form-label">Heading</label>
    <input type="text" name="heading" class="form-control" value="{{ old('heading', $item->heading ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Subheading</label>
    <input type="text" name="subheading" class="form-control" value="{{ old('subheading', $item->subheading ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Background Image</label>
    <input type="file" name="background" class="form-control">
    @if (isset($item) && $item->background)
        <img src="{{ Storage::url($item->background) }}" height="100" class="img-thumbnail mt-2">
    @endif
</div>
