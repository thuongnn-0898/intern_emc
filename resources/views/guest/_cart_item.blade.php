@foreach(session()->get('cart') ?? $cart ?? [] as $k => $item)
    <div class="product-widget cart-item">
        <div class="product-img">
            <img src="{{ asset('uploads/'.$item['image'])  }}" alt="">
        </div>
        <div class="product-body">
            <h3 class="product-name"><a href="#">{{ $item['name'] }}</a></h3>
            <h4 class="product-price"><span class="qty">{{ $item['qty'] }} x </span>{{ $item['price'] }}</h4>
        </div>
        <button class="delete delete-cart-item" data-id="{{ $item['id'] }}"><i class="fa fa-close"></i></button>
    </div>
@endforeach
