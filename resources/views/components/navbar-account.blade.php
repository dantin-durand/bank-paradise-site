<nav class="navbar-default__container">
    <a href="/dashboard"><img src="/img/logo-white.svg" alt="logo bank-paradise"></a>
    <div>
        <div class="navbar__burger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar__items">
            <ul>
                <li><a href="#">Activités</a></li>
                <li><a href="#">Virements</a></li>
                <li><a href="#">Entrerpise</a></li>
            </ul>
            <ul>
                <li><a href="/account">Compte</a></li>
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a></li>
            </ul>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>