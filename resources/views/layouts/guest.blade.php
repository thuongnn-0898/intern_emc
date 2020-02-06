@extends('layouts.app')
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('library/css/bootstrap.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('library/css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('library/css/slick-theme.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('library/css/nouislider.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('library/css/guest.css') }}"/>
@endsection
@section('content')
    <body>
        @include('guest.header')
        @yield('main')
        @include('guest.footer')
        <script src="{{ asset('library/js/jquery.min.js') }}"></script>
        <script src="{{ asset('library/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('library/js/slick.min.js') }}"></script>
        <script src="{{ asset('library/js/nouislider.min.js') }}"></script>
        <script src="{{ asset('library/js/jquery.zoom.min.js') }}"></script>
        <script src="{{ asset('library/js/main.js') }}"></script>
    </body>
@endsection
