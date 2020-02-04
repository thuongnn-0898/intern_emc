@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('category.titleCrea') }}</h4>
                        @include('admin.category._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
