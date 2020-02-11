<tr>
    <td>{{ numIndex(($_GET['page'] ?? 1), $key) }}</td>
    <td><img src="{{ asset($user->imageDefaul()) }}" class="img-fluid default-img"/></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->getStatus() }}</td>
    <td>{{ $user->getRole() }}</td>
    <td>{{ $user->created_at }}</td>
    <td>
        <button class="btn btn-warning btn-sm">
            {{ trans('admin.edit') }}
        </button>
    </td>
</tr>
