<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        @yield('menu_top')
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('library/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('library/js/custom.min.js') }}"></script>
    <script src="{{ asset('library/js/settings.js') }}"></script>
    <script src="{{ asset('library/js/gleek.js') }}"></script>
    <script src="{{ asset('library/js/styleSwitcher.js') }}"></script>
</body>
</html>
