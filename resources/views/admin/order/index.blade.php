@extends('admin.layout')
@section('main')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="active-member">
                            <div class="table-responsive">
                                <table class="table table-xs mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('admin.dashboard.customer') }}</th>
                                        <th>{{ trans('admin.dashboard.state') }}</th>
                                        <th>{{ trans('admin.dashboard.country') }}</th>
                                        <th>{{ trans('admin.dashboard.status) }}</th>
                                        <th>{{ trans('admin.dashboard.amount) }}</th>
                                        <th>{{ trans('admin.dashboard.acti) }}</th>
                                        <th>{{ trans('admin.dashboard.create_at') }}</th>
                                        @if(Auth::user()->isAdmin())
                                            <th>{{ trans('admin.dashboard.action') }}</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @each('guest.users._order_item', $orders, 'order')
                                    </tbody>
                                </table>
                                <div class="mt-lg-2 pull-right">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

