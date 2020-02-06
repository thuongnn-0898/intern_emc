<tr id="order-item-{{ $order->id }}">
    <td><img src="{{ asset($order->user->imageDefault()) }}" class=" rounded-circle mr-3" alt="">{{ $order->user->name }}</td>
    <td>
        <span>{{ $order->state }}</span>
    </td>
    <td>{{ $order->address }}</td>
    <td>
        <div class="progress" style="height: 10px">
            @if($order->status == 1)
                <div class="progress-bar bg-success" style="width: 100%"></div>
            @elseif($order->status == 0)
                <div class="progress-bar bg-warning" style="width: 100%"></div>
            @else
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            @endif
        </div>
    </td>
    <td>$ {{ $order->amout }}</td>
    <td>
        <span class="m-0 pl-3">{{ $order->created_at->diffForHumans() }}</span>
    </td>
    <td>
        <span>
            <button type="button"
                    class="btn btn-primary order-detail"
                    data-toggle="modal"
                    data-target="#basicModal-{{$order->id}}"
                    data-id="{{ $order->id }}"
                    data-url="{{ Auth::user()->isAdmin() ? route('order.show', $order->id) : route('orders.show', $order->id) }}"
            >
                <i class="fa fa-circle-o text-success  mr-2"></i>{{ trans('order.details') }}
            </button>
        </span>
    </td>
    @if(Auth::user()->isAdmin() || isset($userAdmin))
        <td class="btn-group">
            @if($order->status == 0)
                <button class="btn btn-outline-success btn-sm handle-order" data-id="{{ $order->id }}" data-type="1" data-url="{{ route('order.update', $order->id) }}">
                    <i class="fa fa-check"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm handle-order" data-id="{{ $order->id }}" data-type="2" data-url="{{ route('order.update', $order->id) }}">
                    <i class="fa fa-close"></i>
                </button>
            @elseif($order->status == 1)
                <button class="btn btn-outline-danger btn-sm handle-order" data-id="{{ $order->id }}" data-type="2" data-url="{{ route('order.update', $order->id) }}">
                    <i class="fa fa-close"></i>
                </button>
            @endif
            <a class="btn btn-outline-primary btn-sm" href="#"><i class="fa fa-mail-reply"></i></a>
            <button class="btn btn-outline-danger btn-sm handle-order" data-id="{{ $order->id }}" data-url="{{ route('order.destroy', $order->id) }}" data-method="delete" type="submit">
                <i class="fa fa-trash"></i>
            </button>
    @endif
</tr>
<div class="modal fade show" id="basicModal-{{$order->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Detail</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <div class="modal-body" id="order-detail-{{$order->id}}">

            </div>
        </div>
    </div>
</div>
