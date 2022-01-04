@extends('layouts.app')

@section('content')
    @include('components.carousel')

    @include('components.featured-cards')

    <div class="container-fluid">
        <h1>Nyheter</h1>
        @include('components.news-grid')
    </div>

@endsection
