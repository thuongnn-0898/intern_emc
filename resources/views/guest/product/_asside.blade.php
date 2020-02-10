<div id="aside" class="col-md-3">
    <div class="aside">
        <h3 class="aside-title">Options</h3>
        <div class="checkbox-filter">
            @foreach(\Config::get('settings.option') as $k => $val)
                <div class="input-checkbox">
                    <input type="checkbox" id="category-1" name="q[option]" value="{{ $k }}">
                    <label for="category-1">
                        <span></span>
                        {{ strtoupper($k) }}
                        <small>(120)</small>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="aside">
        <h3 class="aside-title">Price</h3>
            <div class="price-filter input-number row">
                <div class="col-md-6">
                    <input type="number" class="form-group" name="q[priceFrom]" placeholder="From" value="@if(isset($_GET['q'])){{ $_GET['q']['priceFrom']}}@endif">
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-group" name="q[priceTo]" placeholder="To" value="@if(isset($_GET['q'])){{ $_GET['q']['priceTo']}}@endif">
                </div>
{{--                <div id="price-slider"></div>--}}
{{--                <div class="input-number price-min">--}}
{{--                    <input id="price-min" type="number" name="q[priceFrom]">--}}
{{--                    <span class="qty-up">+</span>--}}
{{--                    <span class="qty-down">-</span>--}}
{{--                </div>--}}
{{--                <span>-</span>--}}
{{--                <div class="input-number price-max">--}}
{{--                    <input id="price-max" type="number" name="q[priceTo]">--}}
{{--                    <span class="qty-up">+</span>--}}
{{--                    <span class="qty-down">-</span>--}}
{{--                </div>--}}
            </div>
        <div class="aside-title" style="margin-top: 0 !important;">
            <button class="btn btn-success btn-sm pull-right" type="submit">
                <i class="fa fa-search-plus"></i>
            </button>
        </div>
    </div>

    <div class="aside">
        <h3 class="aside-title">Brand</h3>
        <div class="checkbox-filter">
            @foreach($cates->where('parent_id', null) as $val)
                <div class="input-checkbox">
                    <input type="checkbox" id="brand-{{ $val->id }}" value="{{ $val->id }}" name="q[category_ids][]" {{ checkeBrand($val->id) }}>
                    <label for="brand-{{ $val->id }}">
                        <span></span>
                        {{ $val->name }}
                        <small>(578)</small>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="aside">
        <h3 class="aside-title">Top selling</h3>
        @for($i = 1; $i <= 3; $i++)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('library/images/product01.png') }}" alt="">
                </div>
                <div class="product-body">
                    <p class="product-category">Category</p>
                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                </div>
            </div>
        @endfor
    </div>
</div>
