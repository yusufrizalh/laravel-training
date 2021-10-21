<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control is-invalid"
        value="{{ old('title') ?? $post->title }}">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="title">Body</label>
    <textarea name="body" id="body" class="form-control is-invalid">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
