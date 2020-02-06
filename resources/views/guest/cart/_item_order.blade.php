<div class="order-col">
    <div><img src="{{ asset('uploads/'.$item['image']) }}" class="img-fluid default-img"/></div>
    <div>{{ $item['qty'] . ' x ' . $item['name'] }}</div>
    <div>$ {{ $item['qty'] * $item['price'] }}</div>
</div>
