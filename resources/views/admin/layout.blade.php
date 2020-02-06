@extends('layouts.app')
@section('css')
    <link href="{{ asset('library/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('library/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('library/plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper" class="menu-toggle">
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
        @include('admin.header')
        @include('admin.sidebar')
        <div class="content-body">
            @yield('main')
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('library/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('library/plugins/toastr/js/toastr.min.js') }}"></script>
    @yield('jsx')
    <script>
        $(document).ready(function(){
            @if(Session::has('flash-msg'))
                let status = "{{ Session::get('flash-msg')['status'] }}";
                let msg = "{{ Session::get('flash-msg')['msg'] }}";
                if(status == 'success'){
                    toastr.success(msg)
                }else if(status == 'danger'){
                    toastr.error(msg)
                }else if(status == 'warning'){
                    toastr.warning(msg)
                }else{
                    toastr.info(msg)
                }
                @php
                    Session::forget('flash-msg');
                @endphp
            @endif
        });

        var channel = pusher.subscribe('Notify');
        channel.bind('order', function(data) {
            let msg = JSON.stringify(data);
            const count = $('#count-order').attr('data-count');
            toastr.info(data.content, data.title);
            $('#count-order').html(parseInt(count) + 1);
            $('#noti-header').prepend(data.item);
            $('#big-item').prepend(data.bigItem);
        });
    </script>
@endsection

