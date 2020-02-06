<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">{{ trans('guestIndex.home') }}</a></li>
                <li><a href="{{ route('product') }}">{{ trans('guestIndex.product') }}</a></li>
                <li><a href="{{ route('cart-show') }}">{{ trans('guestIndex.cartPage') }}</a></li>
            </ul>
        </div>
    </div>
</nav>
