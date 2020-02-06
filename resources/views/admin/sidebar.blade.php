<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">{{ trans('admin.sidebar.home') }}</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">{{ trans('admin.sidebar.home') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ Auth::check() && Auth::user()->isAdmin() ? route('adminDashboard') : route('users.index') }}">{{ trans('admin.sidebar.home') }}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-label">{{ trans('admin.sidebar.user') }}</li>
            @auth
                @if(Auth::user()->isAdmin())
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{ trans('admin.sidebar.product') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                            <li><a href="{{ route('product.create') }}">{{ trans('admin.sidebar.create') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">{{ trans('admin.sidebar.cate') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('category.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                            <li><a href="{{ route('category.create') }}">{{ trans('admin.sidebar.create') }}</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">{{ trans('admin.sidebar.product') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('product.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                            <li><a href="{{ route('product.create') }}">{{ trans('admin.sidebar.create') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">{{ trans('admin.sidebar.user') }}</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">{{ trans('admin.sidebar.user') }}</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('user.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                            <li><a href="{{ route('user.create') }}">{{ trans('admin.sidebar.create') }}</a></li>
                        </ul>
                    </li>
                @endif
            @endauth
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-list menu-icon"></i><span class="nav-text">{{ trans('admin.sidebar.order') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('order.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('suggest.index') }}" aria-expanded="false" class="has-arrow">
                    <i class="icon-note menu-icon"></i><span class="nav-text">{{ trans('admin.sidebar.suggest') }}</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('suggest.index') }}">{{ trans('admin.sidebar.list') }}</a></li>
                    @auth
                        @if(!Auth::user()->isAdmin())
                            <li><a href="{{ route('suggest.create') }}">{{ trans('admin.sidebar.create') }}</a></li>
                        @endif
                    @endauth
                </ul>
            </li>
            <li>
                <a href="" onclick="event.preventDefault();" id="change-sidebar" data-type="horizontal">
                    <i class="icon-refresh menu-icon"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
