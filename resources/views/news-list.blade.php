@extends('layouts.app', ['jumbotron' => "https://via.placeholder.com/1920x1080", 'pageTitle' => 'Nyheter'])


@section('content')

    <div class="container mt-2">
        @include('components.news-grid')
    </div>

@endsection
