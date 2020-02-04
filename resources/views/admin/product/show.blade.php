@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="mb-0">{{ $product->name }}</h3>
                        <div class="media align-items-center mb-4">
                            <img class="mr-3 m-auto default-img" src="{{ asset('uploads/'.$product->image) }}" alt="">
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card card-profile text-center mb-0">
                                    <span class="mb-1 text-primary"><i class="icon-eye"></i></span>
                                    <h3 class="mb-0">{{ $product->view }}</h3>
                                    <p class="text-muted px-4">{{trans('product.table.view')}}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center mb-0">
                                    <span class="mb-1 text-warning"><i class="icon-check"></i></span>
                                    <h3 class="mb-0 f-15">{{ \App\Enums\ProductStatus::getDescription($product->status) }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card card-profile text-center mb-0">
                                    <span class="mb-1 text-primary"><i class="icon-list"></i></span>
                                    <h3 class="mb-0">{{ $product->quantity }}</h3>
                                    <p class="text-muted px-4">{{trans('product.table.quantity')}}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center mb-0">
                                    <span class="mb-1 text-warning"><i class="icon-ecommerce-money"></i></span>
                                    <h3 class="mb-0">{{ $product->price }}</h3>
                                    <p class="text-muted">{{trans('product.table.price')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center row btn-group">
                            <div class="col-md-6">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-danger">{{trans('admin.edit')}}</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('product.index') }}" class="btn btn-primary">{{trans('admin.back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="media media-reply text-center">
                            @if($product->imageDetails())
                                <div class="media-body">
                                    <div class="d-sm-flex justify-content-between mb-2">
                                        <h5 class="mb-sm-0">{{trans('product.table.imageDetail')}}</h5>
                                    </div>
                                @foreach($product->imageDetails as $image)
                                    <img
                                        src="{{ asset('uploads/'.$image->image) }}"
                                        class="img-fluid m-3"
                                        width="100"
                                        height="100"/>
                                @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="media media-reply">
                            <div class="media-body">
                                <div class="d-sm-flex justify-content-between mb-2">
                                    <h5 class="mb-sm-0">{{trans('product.table.short')}}<small class="text-muted ml-3">{{ $product->created_at }}</small></h5>
                                </div>
                                <p>{{ $product->shortText }}</p>
                            </div>
                        </div>

                        <div class="media media-reply">
                            <div class="media-body">
                                <div class="d-sm-flex justify-content-between mb-2">
                                    <h5 class="mb-sm-0">{{trans('product.table.long')}}</h5>
                                </div>
                                <p>{{ $product->longText }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
