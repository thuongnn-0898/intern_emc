<div class="card">
    <div class="card-body">
        <div class="media align-items-center mb-4">
            <img class="mr-3 default-img-nor" src="{{ asset($order->user->imageDefault()) }}"alt="">
            <div class="media-body">
                <h3 class="mb-0">{{ $order->user->name }}</h3>
            </div>
        </div>
        <div class="row">
            @foreach($order->orderDetails as $val)
                <div class="col">
                    <div class="card card-profile text-center">
                        <span class="mb-1 text-primary">
                            <img src="{{ asset('uploads/'.$val->product->image) }}" width="50px"/>
                        </span>
                        <h3 class="mb-0">$ {{ $val->product->price }}</h3>
                        <p class="text-muted px-4">x {{ $val->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <span class="badge badge-warning">Note * : </span> <p>{{ $order->description }}</p>
    </div>
    <div class="card-footer">
        Total: <span class="pull-right"><b>$ {{ $order->amout }}</b></span>
    </div>
</div>
