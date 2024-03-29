<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    <section class="alert-success">
        @if (session('success'))
            <div class="alert alert-success">
                <span class="alert-success"> {{ session('success') }}</span>
            </div>
        @endif
    </section>
    <section class="alert-error">
        @if (session('error'))
            <div class="alert alert-error alert-error-item">
                <span class="alert-error"> {{ session('error') }}</span>
            </div>
        @endif
    </section>
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
