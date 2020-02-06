<div id="aside" class="col-md-3">
    <div class="aside">
        <h3 class="aside-title">{{ trans('product.order.option') }}</h3>
        <div class="checkbox-filter">
            @foreach(\Config::get('settings.option') as $k => $val)
                <div class="input-checkbox">
                    <input type="checkbox" id="category-1" name="q[option]" value="{{ $k }}">
                    <label for="category-1">
                        <span></span>
                        {{ strtoupper($k) }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="aside">
        <h3 class="aside-title">{{ trans('product.order.price') }}</h3>
            <div class="price-filter input-number row">
                <div class="col-md-6">
                    <input type="number"
                           class="form-group"
                           name="q[priceFrom]"
                           placeholder="From"
                           value="@if(isset($_GET['q'])){{ $_GET['q']['priceFrom']}} @endif">
                </div>
                <div class="col-md-6">
                    <input type="number"
                           class="form-group"
                           name="q[priceTo]"
                           placeholder="To"
                           value="@if(isset($_GET['q'])){{ $_GET['q']['priceTo']}} @endif">
                </div>
            </div>
        <div class="aside-title mt-0">
            <button class="btn btn-success btn-sm pull-right" type="submit">
                <i class="fa fa-search-plus"></i>
            </button>
        </div>
    </div>

    <div class="aside">
        <h3 class="aside-title">{{ trans('product.order.brand') }}</h3>
        <div class="checkbox-filter">
            @foreach($cates->where('parent_id', null) as $val)
                <div class="input-checkbox">
                    <input type="checkbox" id="brand-{{ $val->id }}" value="{{ $val->id }}" name="q[category_ids][]" {{ checkeBrand($val->id) }}>
                    <label for="brand-{{ $val->id }}">
                        <span></span>
                        {{ $val->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="aside">
        <h3 class="aside-title">{{ trans('product.order.topSell') }}</h3>
        @for($i = 1; $i <= 3; $i++)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('library/images/product01.png') }}" alt="">
                </div>
                <div class="product-body">
                    <p class="product-category">{{ trans('category.title') }}</p>
                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                </div>
            </div>
        @endfor
    </div>
</div>
