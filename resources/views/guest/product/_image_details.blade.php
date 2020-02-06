<div class="col-md-5 col-md-push-2">
    <div id="product-main-img">
        <div class="product-preview">
            <img src="{{ asset('uploads/'.$product->image) }}" alt="" class="max-img-lg">
        </div>
        @each('guest.product._image_review', $product->imageDetails, 'image')
    </div>
</div>

<div class="col-md-2  col-md-pull-5">
    <div id="product-imgs">
        <div class="product-preview">
            <img src="{{ asset('uploads/'.$product->image) }}" alt="">
        </div>
        @each('guest.product._image_review', $product->imageDetails, 'image')
    </div>
</div>
