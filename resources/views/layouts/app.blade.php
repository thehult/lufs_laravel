<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LUFS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <div id="app">
        @include('components.navbar')

        @isset($jumbotron)
            <div class="jumbotron">
                <img src="{{ $jumbotron }}" class="img-jumbotron" />
                @isset($pageTitle)
                <div class="container">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                @endisset
            </div>
        @endisset
        @empty($jumbotron)
        @isset($pageTitle)
            <div class="container-narrow mt-2">
                <h1>{{ $pageTitle }}</h1>
            </div>
            @endisset
        @endempty
        <main class="">
            @yield('content')
        </main>

        @include('components.footer')
    </div>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>
