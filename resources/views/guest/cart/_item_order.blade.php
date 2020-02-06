<div class="order-col">
    <div><img src="{{ asset($item['image']) }}" class="img-fluid" width="75" height="100"/></div>
    <div>{{ $item['qty'] . ' x ' . $item['name'] }}</div>
    <div>$ {{ $item['qty'] * $item['price'] }}</div>
</div>
