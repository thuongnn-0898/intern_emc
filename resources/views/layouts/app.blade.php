<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/box-chat.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('library/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    @yield('css')
</head>
<body>
    <div class='notifications top-right'></div>
    <div id="user_id" data-id="{{ Auth::id() ?? '' }}"></div>
    <div id="app">
        @include('sweet::alert')
        @yield('menu_top')
        <main>
            @yield('content')
        </main>
    </div>
    @auth
        <button class="open-button onAbove btn-success btn-sm" onclick="openForm()">{{ trans('admin.chat') }}</button>
        <div class="chat-popup onAbove" id="myForm">
            <form action="" class="form-container">
                <h1>Chat</h1>
                <div class="container">
                    <label for="msg" id="asdmsg"><b>{{ trans('admin.message') }}</b></label>
                    <ul id="list-chat">
                    </ul>
                </div>
                <textarea placeholder="Type message.." name="msg" required id="message-input"></textarea>
                <button type="button" class="btn-sm btn" id="send-msg">Send</button>
                <button type="button" class="btn-sm btn cancel" onclick="closeForm()">{{ trans('admin.close' }}</button>
            </form>
        </div>
    @endauth
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('library/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('library/js/custom.min.js') }}"></script>
    <script src="{{ asset('library/js/settings.js') }}"></script>
    <script src="{{ asset('library/js/gleek.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
    <script src="https://js.pusher.com/4.3/pusher.min.js"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
        $(document).ready(function(){
            $('#send-msg').click(function () {
                let msg = $('#message-input').val();
               $.ajax({
                   url: '/send-message',
                   data: { msg },
                   dataType: 'json',
                   type: 'post',
                   success: function (res) {
                       $('#message-input').val('');
                   }
               });
            });

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

        Pusher.logToConsole = true;
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: 'ap1',
            encrypted: true
        });

        var chat = pusher.subscribe('chat.room');
        chat.bind('.chat.message', function(data) {
            let msg = JSON.stringify(data);
            $('#list-chat').append(data.item);

            if($('#myForm').css('display') === 'none'){
                $('.top-right').notify({
                    message: { text: "You have a Message" },
                    type: "info",
                }).show();
                toastr.info("You have a Message")
            }
        });
    </script>
    @yield('js')
</body>
</html>
