@extends('admin.layout')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4 text-center">
                            <img class="mr-3 m-auto" src="{{ asset(Auth::user()->imageDefault()) }}" width="160" height="130" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                <p class="text-muted mb-0">{{ \App\Enums\UserRole::getDescription(Auth::user()->role) }}</p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                    <h3 class="mb-0"></h3>
                                    <p class="text-muted px-4"></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card card-profile text-center">
                                    <span class="mb-1 text-warning"><i class="icon-user-follow"></i></span>
                                    <h3 class="mb-0"></h3>
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                        </div>

                        <h4>About Me</h4>
                        <p class="text-muted"></p>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                            <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
