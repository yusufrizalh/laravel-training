    @extends('layouts/master')

    @section('title', 'Kontak')

    @section('head')
        <style>
            body {
                background-color: yellowgreen;
            }

        </style>
    @endsection

    @section('content')
        <div class="container">
            <h3>Halaman Kontak dari kontak.blade.php</h3>
            <p>Nama saya adalah <?= $nama ?></p>
            <p>Nama saya adalah {{ $nama }}</p>
            <p>Nama saya adalah {!! $nama !!}</p>
            <p>{!! nl2br($teks) !!}</p>
        </div>
    @endsection
