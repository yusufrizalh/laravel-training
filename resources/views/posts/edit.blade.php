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
                            @include('partials/form-control')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
