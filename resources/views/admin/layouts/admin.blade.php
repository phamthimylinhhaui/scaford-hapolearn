<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', __('admin'))</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>
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
    @include('admin.layouts.header')
    <div class="row">
       <div class="col-2">
           @include('admin.layouts.menu')
       </div>
       <div class="col-9">
           @yield('content')
       </div>
    </div>
    @include('admin.layouts.footer')
</main>

<script src="{{ asset('js/app.js') }}"></script>
@stack('js')

</body>
</html>
