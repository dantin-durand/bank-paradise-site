@extends('layouts.services')

@section('content')
<header class="services__header__container">
    <div class="services__header__title">
        <h1>Fonctionnement</h1>
        <p>
            Bank Paradise est un service de simulation bancaire. Il permet de réaliser de fausses transactions entre les différents membres d'une communauté Rôleplay,
        </p>
    </div>
    <div class="services__header__stepes">
        <div>
            <h2>1</h2>
            <p>Inscrivez-vous et sélectionnez une formule.</p>
        </div>
        <div>
            <h2>2</h2>
            <p>Configurez votre communauté (devise, nom, premier versement, etc...).</p>
        </div>
        <div>
            <h2>3</h2>
            <p>Invitez vos membres à rejoindre votre communauté.</p>
        </div>
        <div>
            <h2>4</h2>
            <p>Commencez à réaliser des transactions, contrôlez les virements.</p>
        </div>
    </div>
</header>
<main class="services__main__container">
    <section class="services__section">
        <img src="/img/steps/transactions.svg" alt="Transactions Rôleplay">
        <div>
            <h1>Transactions Rôleplay</h1>
            <p>Effectuez des transactions intracommunautaires ou extracommunautaires avec l'offre évasion. Payez avec une monnaie en temps réel, consultez vos transactions.</p>
        </div>
    </section>
    <section class="services__section">
        <img src="/img/steps/admin.svg" alt="Administration et gestion
de la communauté">
        <div>
            <h1>Administration et gestion
                de la communauté</h1>
            <p>En tant que fondateur d'une communauté, vous avez la possibilité de contrôler et de supprimer des virements ou des membres. Vous avez également accès au registre des joueurs signalés par d'autres communautés.</p>
        </div>
    </section>
    <section class="services__section">
        <img src="/img/steps/entrerpise.svg" alt="Compte entreprise">
        <div>
            <h1>Compte entreprise</h1>
            <p>Gérez les comptes bancaires de votre entreprise avec un système de gestion des employés et un paramétrage de l'envoi automatique des salaires.</p>
        </div>
    </section>
    <section class="services__section">
        <img src="/img/steps/virements.svg" alt="Historique des virements">
        <div>
            <h1>Historique des virements</h1>
            <p>Consultez vos transactions à tout moment depuis votre espace client. Retrouvez vos virement reçu et envoyé avec des statistiques globales.
            </p>
        </div>
    </section>
</main>
@endsection