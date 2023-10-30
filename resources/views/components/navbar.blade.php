<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="{{ route('homepage') }}">Il MezzoTonto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'home') active @endif" aria-current="page" href="{{ route('homepage') }}">Home</i></a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'article.create') active @endif" aria-current="page" href="{{ route('article.create') }}">Crea Articolo</a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == 'article.index') active @endif" aria-current="page" href="{{ route('article.index') }}">Lista Articoli</a>
                </li>
                @endauth
            </ul>
        </div>
        <div>
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                @if (Auth::check())
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link @if(Route::currentRouteName() == 'login') active @endif" aria-current="page" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Route::currentRouteName() == 'register') active @endif" aria-current="page" href="{{ route('register') }}">Registrazione</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
