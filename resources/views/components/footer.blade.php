@props(['type'])

<footer>
    <div class="auth-footer__container {{ $type }}">
        <a href="/login" class="btn btn-large btn-line">Connexion</a>
        <div class="spacer"></div>
        <a href="/register" class="btn btn-large btn-full">Inscription</a>
    </div>
    <div class="legals-footer__container">
        <div>
            <a href="#">mentions légales</a>
            <a href="#">cgu</a>
        </div>
        <div>
            <p>2021 © Tous droits réservés | bank-paradise.com</p>
            <img src="/img/logo-white.svg" alt="logo bank-paradise">
        </div>
    </div>
</footer>