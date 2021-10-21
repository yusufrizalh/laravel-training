    @extends('layouts/master')

    @section('title', 'Home')

    @section('content')
        <div class="container">
            {{ 'Nama saya adalah ' . $nama }}
        </div>
    @endsection
