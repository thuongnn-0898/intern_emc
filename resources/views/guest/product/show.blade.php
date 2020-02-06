@extends('layouts.guest')
@section('main')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @include('guest.product._image_details')
                <div class="col-md-5">
                    @include('guest.product._product_detail')
                </div>
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="{{ old('content') || isset($_GET['page']) ? '' : 'active' }}"><a data-toggle="tab" href="#tab1">{{ trans('product.tab.desc') }}</a></li>
                            <li><a data-toggle="tab" href="#tab2">{{ trans('product.tab.details') }}</a></li>
                            <li class="{{ old('content') || isset($_GET['page']) ? 'active' : '' }}"><a data-toggle="tab" href="#tab3">{{ trans('product.tab.review') }}</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ $product->longText }}
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab3" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-3">
                                        @include('guest.product._review_star')
                                    </div>
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @if(count($product->comments))
                                                    @each('guest.product._review_content', $product->comments()->paginate(3), 'comment')
                                                @else
                                                    <div class="review-body">
                                                        <h3>{{ trans('product.show.firstReview') }}</h3>
                                                    </div>
                                                @endif
                                            </ul>
                                            <ul class="reviews-pagination">
                                                {{ $product->comments()->paginate(3)->links() }}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            @include('guest.product._form_review')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
