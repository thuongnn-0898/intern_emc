@extends('admin.layout')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="active-member">
                        <div class="table-responsive">
                            <table class="table table-xs mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Suggest at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @each('suggest._suggest', $suggests, 'item')
                                </tbody>
                            </table>
                            <div class="mt-lg-2 pull-right">
                                {{--                                {{ $orders->links() }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
