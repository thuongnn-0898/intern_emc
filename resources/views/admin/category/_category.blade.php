<tr>
    <td>{{ numIndex(($_GET['page'] ?? 1), $key) }}</td>
    <td>{{ $cate->name }}</td>
    <td>{{ $cate->parent->name }}</td>
    <td>{{ $cate->created_at }}</td>
    <td>
        <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-warning btn-sm">{{ trans('category.btn.edit') }}</a>
        <a class="btn btn-danger btn-sm del-cate" onclick="event.preventDefault();">
            {{ trans('category.btn.delete') }}
        </a>
        <form action="{{ route('category.destroy', $cate->id) }}" method="post" id="delete-cate">
            @method('delete')
            @csrf
        </form>
    </td>
</tr>
