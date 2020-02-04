<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-right">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">{{ trans('guestIndex.account') }}</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();" id="logout">
                                    {{ trans('guestIndex.logout') }}
                                </a>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">{{ trans('guestIndex.login') }}</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">{{ trans('guestIndex.register') }}</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>

    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="{{ asset('library/images/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="{{ trans('guestIndex.search-here') }}">
                            <button class="search-btn">{{ trans('guestIndex.search') }}</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{ trans('guestIndex.cart') }}</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('library/images/product01.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{ asset('library/images/product01.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>{{ trans('guestIndex.subTotal') }}: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">{{ trans('guestIndex.viewCart') }}</a>
                                    <a href="#">{{ trans('guestIndex.checkout') }}  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>{{ trans('guestIndex.menu') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@include('guest.nav')
