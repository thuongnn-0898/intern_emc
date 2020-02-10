<tr id="order-item-{{ $item->id }}">
    <td>{{ numIndex(($_GET['page'] ?? 1), $key ?? 1) }}</td>
    <td><img src="{{ asset($item->user->imageDefault()) }}" class=" rounded-circle mr-3" alt="">{{ $item->user->name }}</td>
    <td>
        <span>{{ $item->price }}</span>
    </td>
    <td>
        image
    </td>
    <td>
        <p>{{ $item->message }}</p>
    </td>
    <td>
        <div class="progress" style="height: 10px">
            @if($item->status == 1)
                <div class="progress-bar bg-success" style="width: 100%"></div>
            @elseif($item->status == 0)
                <div class="progress-bar bg-warning" style="width: 100%"></div>
            @else
                <div class="progress-bar bg-danger" style="width: 100%"></div>
            @endif
        </div>
    </td>
    <td>
        <span class="m-0 pl-3">{{ $item->created_at->diffForHumans() }}</span>
    </td>
    @if(Auth::user()->isAdmin())
        <td class="btn-group">
            @if($item->status == 0)
                <a href="{{ route('suggest-create', $item->id) }}" class="btn btn-outline-success btn-sm">
                    <i class="fa fa-check"></i>
                </a>
                <button class="btn btn-outline-danger btn-sm handle-order" data-id="{{ $item->id }}" data-type="2" data-url="{{ route('suggest.update', $item->id) }}">
                    <i class="fa fa-close"></i>
                </button>
            @elseif($item->status == 1)
                <button class="btn btn-outline-danger btn-sm handle-order" data-id="{{ $item->id }}" data-type="2" data-url="{{ route('suggest.update', $item->id) }}">
                    <i class="fa fa-close"></i>
                </button>
            @else
                <a href="{{ route('suggest-create', $item->id) }}" class="btn btn-outline-success btn-sm">
                    <i class="fa fa-check"></i>
                </a>
            @endif
            <a class="btn btn-outline-primary btn-sm handle-order" href="#"><i class="fa fa-mail-reply"></i></a>
            <form method="post" action="{{ route('suggest.destroy', $item->id) }}">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger btn-sm handle-order" href="{{ route('order.destroy', $item->id) }}" type="submit">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    @endif
</tr>

