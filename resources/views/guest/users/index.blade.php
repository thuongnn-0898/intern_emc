@extends('admin.layout')
@section('main')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Products Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Net Profit</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ 8541</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">New Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">4565</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Customer Satisfaction</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">99%</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="mr-2">
                            <span>Success </span> <div class="progress" style="height: 10px; width: 50px;">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="mr-lg-2">
                            <span>Pending </span> <div class="progress" style="height: 10px; width: 50px;">
                                <div class="progress-bar bg-warning" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="mr-lg-2">
                            <span>Cancel </span> <div class="progress" style="height: 10px; width: 50px;">
                                <div class="progress-bar bg-danger" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                <tr>
                                    <th>{{ trans('admin.dashboard.customer') }}</th>
                                    <th>{{ trans('admin.dashboard.product') }}</th>
                                    <th>{{ trans('admin.dashboard.country') }}</th>
                                    <th>{{ trans('admin.dashboard.status') }}</th>
                                    <th>{{ trans('admin.dashboard.paid') }}</th>
                                    <th>{{ trans('admin.dashboard.acti') }}</th>
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
