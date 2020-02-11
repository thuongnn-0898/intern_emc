<div class="col-md-12">
    @include('share.errors')
</div>
@if(isset($user))
    <form
        action="{{ route('user.update', $user->id) }}"
        class="col-md-12 row"
        method="POST"
        id="form-user"
        enctype="multipart/form-data"
    >
    <input value="{{ $user->id }}" type="hidden" name="id">
    @method('put')
@else
    <form
        action="{{ route('user.store') }}"
        class="col-md-12 row"
        method="POST"
        id="form-user"
        enctype="multipart/form-data"
    >
@endif
    @csrf
    @include('admin.users._basicInfo')
    @include('admin.users._detailInfo')
</form>
<div class="col-md-12 text-center">
    <button class="btn btn-success btn-lg" id="user-btn">
        {{ isset($cate) ? trans('admin.update') : trans('admin.create') }}
    </button>
</div>
