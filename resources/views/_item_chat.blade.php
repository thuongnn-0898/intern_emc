<li class="item-chat" style="font-size: 14px">
    @if($user->isAdmin())
        <span><b>Administrator</b></span>
    @else
        <span>{{ $user->name }}</span>
    @endif
     : {{ $message }} {{ $time }}
</li>
