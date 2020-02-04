@extends('layouts.app')
@section('css')
    <link href="{{ asset('library/css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ asset('library/images/logo.png') }}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('library/images/logo-compact.png') }}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('library/images/logo-text.png') }}" alt="">
                    </span>
                </a>
            </div>
        </div>
        @include('Admin.header')
        @include('Admin.sidebar')
        <div class="content-body">
            @yield('main')
        </div>
    </div>
@endsection
