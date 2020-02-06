@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('product.productT') }}</h4>
                        <div class="basic-form">
                            @include('share.errors')
                            <form action="{{ route('suggest-store', $suggest->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">{{ trans('product.table.name') }}</label>
                                    <div class="col-md-10">
                                        <input type="text"
                                               class="form-control input-default"
                                               placeholder="Name product"
                                               name="name"
                                               value="{{ old('name') ?? $suggest->name }}"
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
                                                value="{{ old('price') ?? $suggest->price }}"
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
                                                value="{{ old('quantity') }}"
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
                                               value="{{ old('shortText') }}"
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
                    value="{{ old('longText') }}"
                >
                    {{ old('longText') }}
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
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Send mail for <b>{{ $suggest->user->name }}</b> request</label>
                                    <div class="col-md-6">
                                        <div class="input-group mt-2">
                                            Send  <input class="form-check-input" checked type="checkbox" name="sendMail">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-success">
                                    Accept
                                </button>
                                <a href="{{ route('category.index') }}" class="btn btn-primary">{{ trans('category.btn.back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ trans('product.table.options') }}</h4>
                        <div class="form-check">
                            @foreach(Config::get('settings.option') as $key => $val)
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="options[{{ $key }}]">
                                    <label class="form-check-label">{{ strtoupper($key) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="card-title">{{ trans('product.table.imageDetail') }}</h4>
                        </div>
                        <div class="input-group mb-3 row" id="clone">
                            <div class="col-md-12 here">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" id="more-img" class="btn btn-sm btn-outline-info"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
