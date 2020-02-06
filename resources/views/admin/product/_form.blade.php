<div class="basic-form">
    @include('share.errors')
    @if(!isset($product))
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{$product->id}}" name="id">
            @method('put')
    @endif
        @csrf
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{{ trans('product.table.name') }}</label>
            <div class="col-md-10">
                <input type="text"
                       class="form-control input-default"
                       placeholder="Name product"
                       name="name"
                       value="{{ isset($product) ? $product->name : old('name') }}"
                >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 row">
                <span class="col-md-3 col-form-label">{{ trans('product.table.price') }}</span>
                <div class="col-md-9">
                    <input
                        type="number"
                        name="price"
                        class="form-control input-default"
                        value="{{ isset($product) ? $product->price : old('price') }}"
                    >
                </div>
            </div>
            <div class="col-md-6 row">
                <span class="col-md-3 col-form-label">{{ trans('product.table.quantity') }}</span>
                <div class="col-md-9">
                    <input
                        type="number"
                        name="quantity"
                        class="form-control input-default"
                        value="{{ isset($product) ? $product->quantity : old('quantity') }}"
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{{ trans('product.table.short') }}</label>
            <div class="col-md-10">
                <input type="text"
                       class="form-control input-default"
                       placeholder="Short Description"
                       name="shortText"
                       value="{{ isset($product) ? $product->shortText : old('shortText') }}"
                >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{{ trans('product.table.long') }}</label>
            <div class="col-md-10">
                <textarea
                    placeholder="Long Description"
                    name="longText"
                    class="form-control"
                    value="{{ isset($product) ? $product->longText : old('longText') }}"
                >
                    {{ isset($product) ? $product->longText : old('longText') }}
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{{ trans('product.table.category') }}</label>
            <div class="col-md-10">
                <select class="form-control" id="sel1" name="category_id">
                    {{ selectMultiLevel($cates, 0, '' , $product->category->id ?? 0) }}
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{{ trans('product.table.image') }}</label>
            <div class="col-md-10">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($product))
            <div class="form-group row">
                <div class="col-md-4 offset-md-4">
                    <img src="{{ asset('uploads/'.$product->image) }}" class="img-fluid">
                </div>
            </div>
        @endif
        <button type="submit"
                class="btn btn-success">
            {{ isset($product) ? trans('admin.btn.update') : trans('admin.btn.create') }}
        </button>
        <a href="{{ route('product.index') }}" class="btn btn-primary">{{ trans('category.btn.back') }}</a>
</div>
