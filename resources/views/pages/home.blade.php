@extends('layouts.home')

@section('content')
<header class="home__header__container">
    <h1>Gérez et automatisez vos transactions <span>roleplay</span></h1>
    <a href="/services" class="btn btn-large">Découvrir</a>
</header>
<main>
    <section class="services__section">
        <img src="/img/steps/transactions.svg" alt="Transactions Rôleplay">
        <div>
            <h1>Transactions Rôleplay</h1>
            <p>Effectuez des transactions intracommunautaires ou extracommunautaires avec l'offre évasion. Payez avec une monnaie en temps réel, consultez vos transactions.</p>
            <a href="/services" class="btn btn-large btn-full">Découvrir</a>
        </div>
    </section>
    <section class="services__section">
        <img src="/img/steps/admin.svg" alt="Administration et gestion
de la communauté">
        <div>
            <h1>Administration et gestion
                de la communauté</h1>
            <p>En tant que fondateur d'une communauté, vous avez la possibilité de contrôler et de supprimer des virements ou des membres. Vous avez également accès au registre des joueurs signalés par d'autres communautés.</p>
            <a href="/services" class="btn btn-large">Découvrir</a>
        </div>
    </section>
    <section class="formules__sections">
        <h1 class="title t-center">Formules</h1>
        <div class="formules__item">
            <h1>1.99€</h1>
            <p>Nouvel arrivant</p>
            <div class="formule_spacer"></div>
            <ul>
                <li>Jusqu'à <strong>10 membres</strong></li>
                <li>Transactions <strong>illimitées</strong></li>
                <li>Historique des transactions</li>
            </ul>
            <div>
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
            </div>
        </div>
        <div class="formules__item recommanded">
            <h1>3.99€</h1>
            <p>Communauté</p>
            <div class="formule_spacer"></div>
            <ul>
                <li>Jusqu'à <strong>30 membres</strong></li>
                <li>Transactions <strong>illimitées</strong></li>
                <li>Historique des transactions</li>
                <li><strong>3 Comptes entreprises</strong> par <strong>membre</strong></li>
            </ul>
            <div>
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
            </div>
        </div>
        <div class="formules__item">
            <h1>1.99€</h1>
            <p>Nouvel arrivant</p>
            <div class="formule_spacer"></div>
            <ul>
                <li>Membres<strong>illimités</strong></li>
                <li>Transactions <strong>illimitées</strong></li>
                <li>Transactions <strong>Extracommunautaires</strong></li>
                <li>Historique des transactions</li>
                <li>Compte entreprise <strong>illimité</strong></li>
            </ul>
            <div>
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
            </div>
        </div>
    </section>
</main>
@endsection