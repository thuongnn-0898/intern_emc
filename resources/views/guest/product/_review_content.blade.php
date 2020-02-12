<li>
    <div class="review-heading">
        <h5 class="name">{{ $comment->user->name }}</h5>
        <p class="date">{{ $comment->created_at }}</p>
        <div class="review-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div>
    </div>
    <div class="review-body">
        <p>{{ $comment->content }}</p>
    </div>
</li>
