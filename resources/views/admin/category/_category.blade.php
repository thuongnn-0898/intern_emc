<tr>
    <td>{{ numIndex(($_GET['page'] ?? 1), $key) }}</td>
    <td>{{ $cate->name }}</td>
    <td>{{ $cate->parent->name }}</td>
    <td>{{ $cate->created_at }}</td>
    <td>
        <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-edit"> </i></a>
        <a class="btn btn-outline-danger btn-sm del-cate" onclick="event.preventDefault();">
            <i class="fa fa-trash"></i>
        </a>
        <form action="{{ route('category.destroy', $cate->id) }}" method="post" id="delete-cate">
            @method('delete')
            @csrf
        </form>
    </td>
</tr>
