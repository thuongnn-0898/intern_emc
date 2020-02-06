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
    <link rel="stylesheet" href="{{ asset('library/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    @yield('css')
</head>
<body>
    <div class='notifications top-right'></div>
    <div id="user_id" data-id="{{ Auth::id() ?? '' }}"></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <script>
        $(document).ready(function(){
            @if(Session::has('flash-msg'))
                $('.top-right').notify({
                    message: { text: "{{ Session::get('flash-msg')['msg'] }}" },
                    type: "{{ Session::get('flash-msg')['status'] }}",
                }).show();
                @php
                    Session::forget('flash-msg');
                @endphp
            @endif
        });
    </script>
</body>
</html>
