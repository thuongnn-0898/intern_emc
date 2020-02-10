@extends('admin.layout')
@section('main')
    <div class="col-lg-8 offset-lg-2">
        <div class="card mt-lg-2">
            <div class="card-body">
                <h4 class="card-title">Suggest Product</h4>
                <div class="basic-form">
                    @include('share.errors')
                    <form action="{{ route('suggest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="name">Name
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
                            <label class="col-lg-2 col-form-label" for="name">Price
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
                            <label class="col-lg-2 col-form-label" for="name">Messsage
                            </label>
                            <div class="col-lg-10">
                                <textarea name="message" class="form-control">
                                    {{ old('message') }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="address">Image
                            </label>
                            <div class="custom-file col-lg-10">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Please enter choose imager</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            Suggest to Admin
                        </button>
                        <a href="{{ route('suggest.index') }}" class="btn btn-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
