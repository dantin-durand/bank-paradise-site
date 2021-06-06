<nav class="navbar-default__container">
    <a href="/"><img src="/img/logo-white.svg" alt="logo bank-paradise"></a>
    <div>
        <div class="navbar__burger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar__items">
            <ul>
                <li><a href="/services">Services</a></li>
                <li><a href="/news">News</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
            @if ( !empty(Auth::User()->name) )
            <ul>
                <li><a href="/account">Compte</a></li>
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <ul>
                <li><a href="{{ route('login') }}">Conexionn</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
            </ul>
            @endif
        </div>
    </div>
</nav>