<div class="product">
    <div class="product-img">
        <img src="{{ asset('uploads/'.$product->image) }}" alt="" class="img-fluid default-img-lg">
        <div class="product-label">
            {{ showOptionTag($product) }}
        </div>
    </div>
    <div class="product-body">
        <p class="product-category">{{ $product->cateName }}</p>
        <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
        <h4 class="product-price">{{ discount($product) }} </h4>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist">
                <i class="fa fa-heart-o"></i>
                <span class="tooltipp">{{ trans('guestIndex.addWish') }}</span>
            </button>
            <button class="add-to-compare">
                <i class="fa fa-exchange"></i>
                <span class="tooltipp">{{ trans('guestIndex.addCompare') }}</span></button>
            <button class="quick-view" data-id="{{ $product->product_id }}" onClick=" location.href= '{{route('product-show', $product->product_id)}}' ">
                <i class="fa fa-eye"></i>
                <span class="tooltipp">{{ trans('guestIndex.quickView') }}</span>
            </button>
        </div>
    </div>
    <div class="add-to-cart">
        <button class="add-to-cart-btn add-cart" data-url="{{ route('cart.store') }}" data-id="{{ $product->product_id }}">
            {{ trans('guestIndex.addCart')}}
        </button>
    </div>
</div>
