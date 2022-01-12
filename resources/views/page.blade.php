@extends('layouts.app', ['jumbotron' => $image, 'pageTitle' => $title])


@section('content')

    <div class="container-narrow mt-2">
        {!! $content !!}
    </div>

@endsection
