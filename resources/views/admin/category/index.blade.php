@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">{{ trans('category.title') }}</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right">{{trans('category.btn.crea')}}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('category.table.name') }}</th>
                                        <th>{{ trans('category.table.parent') }}</th>
                                        <th>{{ trans('category.table.created') }}</th>
                                        <th>{{ trans('admin.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @each('admin.category._category', $cates, 'cate')
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('category.table.name') }}</th>
                                        <th>{{ trans('category.table.parent') }}</th>
                                        <th>{{ trans('category.table.created') }}</th>
                                        <th>{{ trans('admin.action') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="float-right">
                                {{ $cates->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
