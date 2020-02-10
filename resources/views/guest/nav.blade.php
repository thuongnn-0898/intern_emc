<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('cart-show') }}">Cart</a></li>
            </ul>
        </div>
    </div>
</nav>
