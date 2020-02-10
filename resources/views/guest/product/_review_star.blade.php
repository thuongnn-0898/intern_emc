<div id="rating">
    <ul class="rating">
        @foreach($product->rate != null ? $product->rate->rates : \Config::get('settings.rates')  as $key => $rate)
            <li class="row">
                <div class="rating-stars col-md-6">
                    @for($i = 0; $i < $key; $i ++ )
                        <i class="fa fa-star"></i>
                    @endfor
                </div>
                <div class="rating-progress col-md-6">
                    <div class="w-100"></div>
                </div>
                <span class="sum">{{ $rate }}</span>
            </li>
        @endforeach
    </ul>
</div>
