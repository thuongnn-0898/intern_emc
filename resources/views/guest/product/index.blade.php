@extends('layouts.guest')
@section('main')
    <div class="section">
        <div class="container">
            <div class="row">
                <form action="{{ route('product') }}" id="form-price">
                    @include('guest.product._asside')
                    <div class="store-sort">
                        <label>
                            {{ trans('product.order.shortBy') }}
                            <select class="input-select" name="q[category_id]">
                                {{selectMultiLevel($cates, 0 , '', $_GET['q']['category_id'] ?? 0)}}
                            </select>
                        </label>

                        <label>
                            {{ trans('product.order.byPrice') }}
                            <select class="input-select" name="q[orderBy]">
                                <option value="desc">{{ trans('product.order.desc') }} </option>
                                <option value="asc">{{ trans('product.order.asc') }} </option>
                            </select>
                        </label>

                        <label>
                            {{ trans('product.order.show') }}
                            <select class="input-select" name="q[perPage]">
                                @foreach(\Config::get('settings.perProduct') as $k => $val)
                                    <option value="{{ $val }}" @if(isset($_GET['q']) && $val == $_GET['q']['perPage']) selected @endif>{{ $val }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
                <div id="store" class="col-md-9">
                    <div class="store-filter clearfix">
                    </div>
                    <div class="row">
                        @each('guest.product._product_item', $products, 'product')
                    </div>

                    <div class="store-filter clearfix">
                        {{ $products->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
