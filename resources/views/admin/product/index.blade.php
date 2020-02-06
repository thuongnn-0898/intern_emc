@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">{{ trans('product.list') }}</h4>
                            </div>
                            <div class="col-md-8 pull-right">
                                <button class="btn btn-sm btn-success pull-right" data-toggle="modal"
                                        data-target="#modelId">{{ trans('admin.product.import') }}</button>
                                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">{{ trans('admin.create') }}</a>
                            </div>

                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                 aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modelTitleId"></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                                <br>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success">{{ trans('product.import') }}</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @include('share.errors')
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
