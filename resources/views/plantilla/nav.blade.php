<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="https://yt3.ggpht.com/ytc/AKedOLR66nQtPFSM_-hHyg37qHUtDWMuAPtbgoF6n1WTMA=s88-c-k-c0x00ffffff-no-rj"
                width="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Empleados</a>
                </li>
            </ul>
            <div class="dropdown">
                <h5 class="btn dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                </h5>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Cerrar sesion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
