<tr id="user-{{ $user->id }}">
    <td>{{ numIndex(($_GET['page'] ?? 1), $key) }}</td>
    <td><img src="{{ asset($user->imageDefault()) }}" class="img-fluid default-img"/></td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->getStatus() }}</td>
    <td>{{ $user->getRole() }}</td>
    <td>{{ $user->created_at }}</td>
    <td >
        <div class="btn-group">
            <a
                href="{{ route('user.edit', $user->id) }}"
                class="btn btn-warning btn-sm text-white">
                <i class="fa fa-pencil"></i>
            </a>
            <button
                class="btn btn-danger btn-sm delete-user text-white"
                data-url="{{ route('user.destroy', $user->id) }}"
                data-id="{{ $user->id }}"
            >
                <i class="fa fa-close"></i>
            </button>
            <button class="btn btn-info btn-sm">
                <i class="fa fa-eye"></i>
            </button>
            <button
                class="btn btn-sm btn-{{ $user->status == 0 ? 'success' : 'danger' }} status-user"
                id="{{ $user->id }}"
                data-status="{{ $user->status }}"
            >
                <i class="fa fa-check"></i>
            </button>
        </div>
    </td>
</tr>
