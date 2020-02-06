@auth
    <div class="header">
        <div class="header-content clearfix">
            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>
            <div class="header-left">
                <div class="input-group icons">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                    </div>
                    <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                    <div class="drop-down animated flipInX d-md-none">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="{{ trans('guestIndex.search') }}">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <ul class="clearfix">
                    @if(Auth::user()->isAdmin())
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1 badgeO" id="count-order" data-count="{{ isset($orders_noti) ? count($orders_noti) : '' }}">
                                    {{ isset($orders_noti) ? count($orders_noti) : '' }}
                                </span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu srcoll-order">
                                <div class="dropdown-content-body">
                                    <ul id="noti-header">
                                        @if(isset($orders_noti))
                                            @each('admin._item_order_noti', $orders_noti, 'item')
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif
                    <li class="icons dropdown d-none d-md-flex">
                        <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                            <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    @foreach(\Config::get('settings.language') as $k => $v)
                                        <li><a href="javascript:void(0)">{{ $v }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"  data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset(!Auth::check() ? '' : Auth::user()->imageDefault()) }}" class="default-img-sm" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{ route('user.show', !Auth::check() ? '' : Auth::id()) }}"><i class="icon-user"></i> <span>{{ trans('admin.profile') }}</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <i class="icon-envelope-open"></i> <span>{{ trans('admin.sidebar.suggest') }}</span>
                                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                    </a>
                                </li>

                                <hr class="my-2">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();" id="logout">
                                            <i class="icon-key"></i>
                                            <span>{{ trans('guestIndex.logout') }}</span>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="{{ route('index') }}">
                                            <i class="icon-home"></i> <span>{{ trans('admin.sidebar.list') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ profileBy() }}">
                                            <i class="icon-user"></i> <span>{{ trans('admin.profile') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <i class="icon-envelope-open"></i> <span>{{ trans('admin.sidebar.suggest') }}</span>
                                            <div class="badge gradient-3 badge-pill gradient-1">
                                            @if(Auth::user()->isAdmin())
                                                {{ \App\Models\Suggest::where('status', 0)->count() }}
                                            @endif
                                            </div>
                                        </a>
                                    </li>

                                    <hr class="my-2">
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();" id="logout">
                                                <i class="icon-key"></i>
                                                <span>{{ trans('guestIndex.logout') }}</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endauth
