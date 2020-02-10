<li class="notification-unread">
    <a href="javascript:void()">
        <img class="float-left mr-3 avatar-img" src="{{ asset($item->user->image_d()) }}" alt="">
        <div class="notification-content">
            <div class="notification-heading">{{ $item->user->name }}</div>
            <div class="notification-timestamp">{{ $item->created_at->diffForHumans() }}</div>
        </div>
    </a>
</li>
<hr class="m-0">
