@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update post: {{ $post->title }}</div>
                    <div class="card-body">
                        <form action="/posts/{{ $post->slug }}/edit" method="post" autocomplete="off">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control is-invalid"
                                    value="{{ old('title') ?? $post->title }}">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Body</label>
                                <textarea name="body" id="body" class="form-control is-invalid"
                                    value="{{ old('body') ?? $post->body }}"></textarea>
                                @error('body')
                                    {{ $message }}
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
