<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    @stack('styles')
</head>
<body>

<header class="p-3 bg-dark text-white">

    @yield('header')

</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <!-- Footer content -->
    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>

