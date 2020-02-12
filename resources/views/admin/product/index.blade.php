@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">{{ trans('admin.category.title') }}</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">{{ trans('product.create') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('product.table.image') }}</th>
                                        <th>{{ trans('product.table.name') }}</th>
                                        <th>{{ trans('product.table.price') }}</th>
                                        <th>{{ trans('product.table.short') }}</th>
                                        <th>{{ trans('product.table.status') }}</th>
                                        <th>{{ trans('product.table.quantity') }}</th>
                                        <th>{{ trans('product.table.view') }}</th>
                                        <th>{{ trans('product.table.category') }}</th>
                                        <th>{{ trans('product.table.created_at') }}</th>
                                        <th>{{ trans('admin.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @each('admin.product._product', $products, 'product')
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('product.table.image') }}</th>
                                        <th>{{ trans('product.table.name') }}</th>
                                        <th>{{ trans('product.table.price') }}</th>
                                        <th>{{ trans('product.table.short') }}</th>
                                        <th>{{ trans('product.table.status') }}</th>
                                        <th>{{ trans('product.table.quantity') }}</th>
                                        <th>{{ trans('product.table.view') }}</th>
                                        <th>{{ trans('product.table.category') }}</th>
                                        <th>{{ trans('product.table.created_at') }}</th>
                                        <th>{{ trans('admin.action') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="float-right">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
