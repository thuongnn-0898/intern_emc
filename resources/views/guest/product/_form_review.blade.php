@if(Auth::check())
    @include('share.errors')
    <form class="review-form" action="{{ route('review') }}" method="post">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        @csrf
        <input class="input" disabled type="text" value="{{ Auth::user()->name }}">
        <input class="input" disabled type="text" value="{{ Auth::user()->email }}">
        <textarea class="input" placeholder="{{ trans('product.show.reviewUr') }}" name="content">
            {{ old('content') }}
        </textarea>
        <div class="input-rating">
            <span>{{ trans('product.show.rateUr') }}: </span>
            <div class="stars">
                <input id="star5" name="rates" value="5" type="radio"><label for="star5"></label>
                <input id="star4" name="rates" value="4" type="radio"><label for="star4"></label>
                <input id="star3" name="rates" value="3" type="radio"><label for="star3"></label>
                <input id="star2" name="rates" value="2" type="radio"><label for="star2"></label>
                <input id="star1" name="rates" value="1" type="radio"><label for="star1"></label>
            </div>
        </div>
         <button type="submit" class="primary-btn">{{ trans('admin.submit') }}</button>
    </form>
@else
    <a class="primary-btn" href="{{ route('login') }}">{{ trans('auth.needLogin')}}</a>
@endif
