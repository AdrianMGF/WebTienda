<!doctype html>
<!-- SECTION: NAV -->

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0d8;">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            <img src="/img/MyWineShop.png" alt="Logo" width="240" height="54">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <form class="form-inline mx-auto" style="width: 60%;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="btn btn-warning">
                            <img src="/img/LupaLogo.png" width="25" height="25">
                        </div>
                    </div>
                    <input type="search" class="form-control" placeholder="Buscar MyWineShop.es"
                        aria-label="Buscar MyWineShop.es">
                </div>
            </form>

            <ul class="navbar-nav">
                @if(Auth::check())
                <a class="nav-link" href="{{ route('user.edit') }}">{{ Auth::user()->name }}</a>
                <a class="nav-link" href="{{ route('user.logout') }}">logout</a>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="login">Autenticación</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.show') }}">
                        <img src="/img/LogoCarrito_Black.png" alt="Logo" width="25" height="25">

                    </a>
                </li>
                @php
                $cart = session()->get('cart', null);
                if($cart != null){
                echo $cart->iTotalItems;
                }
                @endphp
            </ul>
        </div>
    </div>
</nav>

</html>
@yield('header_content')