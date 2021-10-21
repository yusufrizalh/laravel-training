@extends('layouts/master')

@section('title', $post->title)

@section('content')
    <div class="container">
        <form action="/posts/{{ $post->slug }}/delete" method="post">
            @csrf
            @method('delete')
            <button type="button" class="btn btn-link btn-md text-danger" data-toggle="modal" data-target="#deleteModal">
                Delete
            </button>

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="deleteModalLabel">Apakah anda yakin menghapus?</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <div>{{ $post->title }}</div>
                                <div class="text-secondary">
                                    <small>Published on {{ $post->updated_at->format('d M Y') }}</small>
                                </div>
                            </div>
                            <form action="/posts/{{ $post->slug }}/delete" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-danger mr-3">Yakin</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <p>Proses Menghapus Data Post</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
    </div>
@endsection
