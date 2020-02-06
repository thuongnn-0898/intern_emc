@extends('admin.layout')
@section('main')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id='morris-bar-chart'></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-widget">
                    <div class="card-body">
                        <h5 class="text-muted">Order Overview </h5>
                        <h2 class="mt-4">5680</h2>
                        <span>Total Revenue</span>
                        <div class="mt-4">
                            <h4>30</h4>
                            <h6>Online Order <span class="pull-right">30%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span class="sr-only">30% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>50</h4>
                            <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span class="sr-only">50% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>20</h4>
                            <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span class="sr-only">20% Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="order-here">
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
                                    <tbody id="big-item">
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
@section('jsx')
    <script src="{{ asset('library/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('library/plugins/morris/morris.min.js') }}"></script>
    <script>
        Morris.Bar({
            element: 'morris-bar-chart',
            data: [{
                y: 'Users',
                b: {{ $data['user'] }},
                c: 12
            }, {
                y: 'Categories',
                b: {{ $data['category'] }},
            }, {
                y: 'Products',
                b: {{ $data['product'] }},
            }, {
                y: 'Orders',
                b: {{ $data['order'] }},
            }, {
                y: 'Suggest',
                b: {{ $data['suggest'] }},
            }],
            xkey: 'y',
            ykeys: ['b'],
            labels: ['Quantity'],
            barColors: ['#7571F9'],
            hideHover: 'auto',
            gridLineColor: 'transparent',
            resize: true
        });
    </script>
@endsection
