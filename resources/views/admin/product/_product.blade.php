<tr id="product-{{$product->id}}">
    <td>{{ numIndex(($_GET['page'] ?? 1), $key) }}</td>
    <td><img src="{{ asset('uploads/'.$product->image) }}" class="img-fluid"></td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->shortText }}</td>
    <td>{{ $product->status }}</td>
    <td>{{ $product->quantity }}</td>
    <td>{{ $product->view }}</td>
    <td>{{ $product->category->name ?? '' }}</td>
    <td>{{ $product->created_at }}</td>
    <td>
        <div class="btn-group">
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <a
                class="btn btn-primary btn-sm"
                href="{{ route('product.show', $product->id) }}"
            >
                <i class="fa fa-eye"></i>
            </a>
            <button
                class="delete-product btn btn-danger btn-sm"
                data-id="{{$product->id}}"
                data-url="{{ route('product.destroy', $product->id) }}"
            >
                <i class="fa fa-close"></i>
            </button>
        </div>
    </td>
</tr>
