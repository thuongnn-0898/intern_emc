@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-xl-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4 text-center">
                            <img
                                id="OpenImgUpload"
                                class="avatar mr-3 m-auto"
                                src="{{ asset(Auth::user()->imageDefault()) }}">
                            <input
                                type="file"
                                id="imgupload"
                                style="display:none"
                            />
                            <div class="media-body">
                                <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                <p class="text-muted mb-0">{{ \App\Enums\UserRole::getDescription(Auth::user()->role) }}</p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="text-muted px-4">{{ trans('flw') }}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                    <h3 class="mb-0">263</h3>
                                    <p class="text-muted">{{ trans('flwer') }}</p>
                                </div>
                            </div>
                        </div>

                        <h4>{{ trans('user.table.address') }}</h4>
                        <p class="text-muted">{{ Auth::user()->profile->address ?? '' }}</p>
                        <ul class="card-profile__info">
                            <li class="mb-1">
                                <strong class="text-dark mr-4">{{ trans('user.table.country') }}</strong> <span>{{ Auth::user()->profile->phone ?? '' }}</span>
                            </li>
                            <li>
                                <strong class="text-dark mr-4">{{ trans('user.table.email') }}</strong> <span>{{ Auth::user()->email}}</span>
                            </li>
                        </ul>
                        <div class="row">
                            <a class="btn btn-success btn-sm" href="{{ route('users.edit', Auth::user()->id) }}">{{ trans('user.edit') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
