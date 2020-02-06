@extends('admin.layout')
@section('main')
    <div class="col-lg-8 offset-lg-2">
        <div class="card mt-lg-2">
            <div class="card-body">
                <h4 class="card-title">{{ trans('suggest.list') }}</h4>
                <div class="basic-form">
                    @include('share.errors')
                    <form action="{{ route('suggest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="name">{{ trans('suggest.name') }}
                            </label>
                            <div class="col-lg-10">
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Please enter the name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="name">{{ trans('suggest.price') }}
                            </label>
                            <div class="col-lg-10">
                                <input type="number"
                                       class="form-control"
                                       id="price"
                                       name="price"
                                       placeholder="Please enter the price" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="name">{{ trans('suggest.message') }}
                            </label>
                            <div class="col-lg-10">
                                <textarea name="message" class="form-control">
                                    {{ old('message') }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="address">{{ trans('suggest.image') }}
                            </label>
                            <div class="custom-file col-lg-10">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">{{ trans('suggest.pickImg') }}</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            {{ trans('suggest.submit') }}
                        </button>
                        <a href="{{ route('suggest.index') }}" class="btn btn-primary">{{ trans('admin.back') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
