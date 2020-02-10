@extends('admin.layout')
@section('main')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Summary</h4>
                        <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="728.094" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.953125px; top: -0.625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="34.859375" y="303" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#000000" d="M47.359375,303H703.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.859375" y="233.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">25</tspan></text><path fill="none" stroke="#000000" d="M47.359375,233.5H703.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.859375" y="164" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#000000" d="M47.359375,164H703.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.859375" y="94.50000000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.000000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">75</tspan></text><path fill="none" stroke="#000000" d="M47.359375,94.50000000000003H703.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="34.859375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#000000" d="M47.359375,25H703.094" stroke-opacity="0" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="656.2558125000002" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2022</tspan></text><text x="562.5794375" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2021</tspan></text><text x="468.90306250000003" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2020</tspan></text><text x="375.2266875" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2019</tspan></text><text x="281.5503125" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2018</tspan></text><text x="187.8739375" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2017</tspan></text><text x="94.1975625" y="315.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016</tspan></text><rect x="59.068921875" y="25" width="21.419093750000002" height="278" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="83.488015625" y="52.80000000000001" width="21.419093750000002" height="250.2" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="152.745296875" y="94.50000000000003" width="21.419093750000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="177.164390625" y="122.30000000000001" width="21.419093750000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="246.42167187500002" y="164" width="21.419093750000002" height="139" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="270.840765625" y="191.8" width="21.419093750000002" height="111.19999999999999" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="340.098046875" y="94.50000000000003" width="21.419093750000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="364.517140625" y="122.30000000000001" width="21.419093750000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="433.77442187500003" y="164" width="21.419093750000002" height="139" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="458.19351562500003" y="191.8" width="21.419093750000002" height="111.19999999999999" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="527.450796875" y="94.50000000000003" width="21.419093750000002" height="208.49999999999997" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="551.869890625" y="122.30000000000001" width="21.419093750000002" height="180.7" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="621.127171875" y="25" width="21.419093750000002" height="278" rx="0" ry="0" fill="#fc6c8e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="645.546265625" y="52.80000000000001" width="21.419093750000002" height="250.2" rx="0" ry="0" fill="#7571f9" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg><div class="morris-hover morris-default-style" style="left: 49.4085px; top: 117px; display: none;"><div class="morris-hover-row-label">2016</div><div class="morris-hover-point" style="color: #FC6C8E">
                                    A:
                                    100
                                </div><div class="morris-hover-point" style="color: #7571f9">
                                    B:
                                    90
                                </div><div class="morris-hover-point" style="color: #FC6C8E">
                                    C:
                                    -
                                </div></div></div>
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
                                        <th>Customers</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Activity</th>
                                        <th>Order at</th>
                                        @if(Auth::user()->isAdmin())
                                            <th>Action</th>
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

