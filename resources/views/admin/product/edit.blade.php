@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Product</h4>
                        @include('admin.product._form')
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
                                    <input class="form-check-input" type="checkbox" name="options[{{ $key }}]" {{checkedOption($key, isset($product) ? $product : false)}}>
                                    <label class="form-check-label">{{ strtoupper($key) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="card-title">Image Details</h4>
                        </div>
                        <div class="input-group mb-3 row" id="clone">
                            @if(isset($product))
                                @foreach($product->imageDetails as $val)
                                    <div class="form-group">
                                        <img src="{{ asset('uploads/'.$val->image) }}" class="img-fluid"/>
                                        <input class="form-check-input" type="checkbox" name="images[][_destroy]" value="{{ $val->id }}">
                                        <label class="form-check-label">{{ trans('admin.btn.delete') }}</label>
                                    </div>
                                @endforeach
                            @endif
                            <div class="col-md-12 here">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">{{ trans('admin.btn.chooseFile') }}</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">{{ trans('admin.btn.chooseFile') }}</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images[]">
                                    <label class="custom-file-label">{{ trans('admin.btn.chooseFile') }}</label>
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
