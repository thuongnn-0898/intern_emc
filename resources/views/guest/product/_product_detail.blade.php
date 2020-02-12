<div class="product-details">
    <h2 class="product-name">{{ $product->name }}</h2>
    <div>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
        </div>
        <a class="review-link" href="#">{{ trans('product.show.reviewMsg', ['count' => count($product->comments)])}}</a>
    </div>
    <div>
        <h3 class="product-price"> {{ discount($product) }}</h3>
        @if($product->quantity > \Config::get('settings.zero'))
            <span class="product-available">{{ trans('product.show.available')}}</span>
        @else
            <span class="product-available">{{ trans('product.show.inavailable')}}</span>
        @endif
    </div>
    <p> {{ $product->shortText }}</p>
    <div class="add-to-cart">
        <div class="qty-label">
            {{ trans('guestIndex.qty')}}
            <div class="input-number">
                <input type="number" name="qty" id="qty-qty" value="0">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
        @if($product->quantity > \Config::get('settings.zero'))
            <button class="add-to-cart-btn add-cart" data-url="{{ route('cart.store') }}" data-id="{{ $product->id }}">
                <i class="fa fa-"></i>{{ trans('guestIndex.addCart') }}
            </button>
        @else
            <button class="add-to-cart-btn" onclick=" location.href ='{{ route('index') }}' ">
                <i class="fa fa-home"></i> {{ trans('product.show.soldout') }}
            </button>
        @endif
    </div>
    <ul class="product-btns">
        <li><a href="#"><i class="fa fa-heart-o"></i>{{ trans('guestIndex.addWish') }}</a></li>
        <li><a href="#"><i class="fa fa-exchange"></i>{{ trans('guestIndex.addCompare') }}</a></li>
    </ul>
    <ul class="product-links">
        <li>{{ trans('product.table.category') }}:</li>
    </ul>
    <ul class="product-links">
        <li>{{ trans('product.show.share') }}:</li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
    </ul>
</div>
