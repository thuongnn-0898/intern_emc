<header>
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-right">
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ route('users.index') }}">{{ trans('guestIndex.account') }}</a></li>
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{ route('adminDashboard') }}">{{ trans('guestIndex.manage') }}</a></li>
                        @endif
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
@php
    $cart = session()->get('cart')
@endphp
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
                        <form class="">
                            <select class="input-select mw-16">
                                {{selectMultiLevel($cates, 0 , '', $_GET['q']['category_id'] ?? 0)}}
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
                                <span>{{ trans('guestIndex.wishList') }}</span>
                                <div class="qty">{{ $cart != null ? count($cart) : 0 }}</div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" id="cart" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{ trans('guestIndex.cart') }}</span>
                                <div class="qty" id="qty-cart">{{ $cart != null ? count(session()->get('cart')) : 0 }}</div>
                            </a>
                            <div class="cart-dropdown pb-0">
                                <div class="cart-list">
                                    @include('guest._cart_item')
                                </div>
                                <div class="cart-summary">
                                    <small id="item-select">{{ trans('guestIndex.itemSelect', ['number'=>$cart != null ? count(session()->get('cart')) : 0]) }}</small>
                                    <h5 id="subtotal">{{ trans('guestIndex.subTotal') }}: ${{getSubTotalCart()}}</h5>
                                </div>
                                <div class="cart-btns row">
                                    <a href="{{ route('cart-show') }}">{{ trans('guestIndex.viewCart') }}</a>
                                    <a href="#">{{ trans('guestIndex.checkout') }}
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                    <a id="close-cart" class="col-md-6" onclick="e.preventDefault();"  href="#">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a id="clear-cart" class="col-md-6 bg-warning">
                                        <i class="fa fa-trash"></i>
                                    </a>
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
