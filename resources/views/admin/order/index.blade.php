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

