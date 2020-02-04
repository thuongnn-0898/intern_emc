<div class="basic-form">
    @include('share.errors')
    @if(!isset($cate))
        <form action="{{ route('category.store') }}" method="POST">
    @else
        <form action="{{ route('category.update', $cate->id) }}" method="post">
            <input type="hidden" value="{{$cate->id}}" name="id">
        @method('put')
    @endif
        @csrf
        <div class="form-group row">
            <div class="col-md-1">
                <label>{{ trans('category.table.name') }}</label>
            </div>
            <div class="col-md-11">
                <input type="text"
                       class="form-control input-default"
                       placeholder="Name category"
                       name="name"
                       value="{{ isset($cate) ? $cate->name : old('name') }}"
                >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-1">
                <label>{{ trans('category.table.parent') }}</label>
            </div>
            <div class="col-md-11">
                <select class="form-control" id="sel1" name="parent_id">
                    {{ menuMultiLevel($cates, 0, '' , $cate->parent_id ?? 0) }}
                </select>
            </div>
        </div>
        <button type="submit"
                class="btn btn-success">
            {{ isset($cate) ? 'Update' : 'Create' }}
        </button>
        <a href="{{ route('category.index') }}" class="btn btn-primary">{{ trans('category.btn.back') }}</a>
    </form>
</div>
