@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">List Users</h4>
                            </div>
                            <div class="col-md-8">
                                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm float-right">{{trans('category.btn.crea')}}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('user.table.avatar') }}</th>
                                    <th>{{ trans('user.table.name') }}</th>
                                    <th>{{ trans('user.table.email') }}</th>
                                    <th>{{ trans('user.table.status') }}</th>
                                    <th>{{ trans('user.table.role') }}</th>
                                    <th>{{ trans('user.table.created') }}</th>
                                    <th>{{ trans('admin.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @each('admin.users._user', $users, 'user')
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('user.table.avatar') }}</th>
                                    <th>{{ trans('user.table.name') }}</th>
                                    <th>{{ trans('user.table.email') }}</th>
                                    <th>{{ trans('user.table.status') }}</th>
                                    <th>{{ trans('user.table.role') }}</th>
                                    <th>{{ trans('user.table.created') }}</th>
                                    <th>{{ trans('admin.action') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="float-right">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
