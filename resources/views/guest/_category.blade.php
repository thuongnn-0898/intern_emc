<li class="dropdown-submenu">
    <a tabindex="-1" href="#">{{ $cate->name }}</a>
    @if(count($cate->children) > 0)
        <ul class="dropdown-menu mw-13">
            @each('guest._category', $cate->children, 'cate')
        </ul>
    @endif
</li>
