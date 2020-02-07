<tr>
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
        <button class="btn btn-warning btn-sm">Edit</button>
    </td>
</tr>
