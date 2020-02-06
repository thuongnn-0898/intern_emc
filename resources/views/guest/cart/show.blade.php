@extends('layouts.guest')
@section('main')
    <div class="section">
        <div class="container">
            <div class="row">
                @include('share.errors')
                <form action="{{ route('orders.store') }}" method="post" id="order-form">
                    @csrf
                    <div class="col-md-7">
                        @if(!Auth::check())
                            <div class="overlay-order">
                                <b>
                                    <div class="">
                                        <a href="{{ route('login') }}">{{ trans('auth.needLogin') }}</a>
                                    </div>
                                </b>
                            </div>
                        @endif
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">{{ trans('order.title') }}</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="state" placeholder="State" value="{{ old('state') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input class="input" type="hidden" name="amout" placeholder="Amount" value="{{ getSubTotalCart() }}">
                            </div>
                            <div class="form-group">
                                <textarea class="input" placeholder="Order Notes" name="description"> {{ old('descripntion') }}</textarea>
                            </div>
                            <div class="form-group row">
                                <div class="input-checkbox col-md-4 offset-md-2">
                                    @auth <input type="checkbox" id="get-my-profile" value="{{ route('users.show', Auth::id()) }}"> @endauth
                                    <label for="get-my-profile">
                                        <span></span>
                                        {{ trans('order.getProfile') }}
                                    </label>
                                </div>
                                <div class="input-checkbox col-md-6">
                                    <input type="checkbox" id="create-account">
                                    <label for="create-account">
                                        <span></span>
                                        {{ trans('order.sendInfo') }}
                                    </label>
                                    <div class="caption">
                                        <p>{{ trans('order.sendMailAccept') }}</p>
                                        <input class="input" type="text" name="email_info" placeholder="Enter Your email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">{{ trans('order.yourO')}}</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>{{ trans('order.billCol.image')}}</strong></div>
                                <div><strong>{{ trans('order.billCol.product')}}</strong></div>
                                <div><strong>{{ trans('order.billCol.total')}}</strong></div>
                            </div>
                            <div class="order-products">
                                @if(session()->get('cart'))
                                    @each('guest.cart._item_order', session()->get('cart'), 'item')
                                @else
                                    {{ trans('order.empty') }}
                                @endif
                            </div>
                            <div class="order-col">
                                <div><strong>{{ trans('order.billCol.total') }}</strong></div>
                                <div><strong class="order-total">$ {{ getSubTotalCart() }}</strong></div>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="terms" name="accept">
                            <label for="terms">
                                <span></span>
                                {{ trans('order.condition') }}
                            </label>
                        </div>
                        @if(Auth::check())
                            @if(session()->get('cart') == null)
                                <a href="{{ route('product') }}" class="primary-btn order-submit">{{ trans('order.order') }}</a>
                            @else
                                <a href="#" class="primary-btn order-submit" id="form-order">{{ trans('order.placeOr') }}</a>
                            @endif
                        @else
                            <a href="#" class="primary-btn order-submit">{{ trans('auth.needLogin') }}</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
