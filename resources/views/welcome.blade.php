@extends('layouts.app')


@section('content')
    @include('components.carousel', ['featured' => $featured])


    <div class="container-fluid">
        @include('components.featured-cards', ['news' => $news])
        <h1>Nyheter</h1>
        @include('components.news-grid')
    </div>

@endsection
