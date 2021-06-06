@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <div class="account__title">
        <h1>Compte</h1>
        <a class="btn btn-full" href="/admin/users">Mode admin</a>
    </div>
    <div class="account__container">
        <div class="account__abonnement card">
            <div>
                <h2>Abonnement</h2>
                <a href="/register/step2" class="btn btn-full">Changer de formule</a>
            </div>
            <div>
                <p>Formule actuelle: Communauté (3.99€)</p>
                <p>Prochain paiement: 02/11/2021</p>
            </div>
            <div>
                <button class="btn btn-line">Annuler l'abonnement</button>
                <button class="btn btn-line">Mettre en pause</button>
            </div>
        </div>
        <div class="account__informations card">
            <div>
                <h2>Informations</h2>
                <a class="btn">Modifier</a>
            </div>
            <ul>
                <li>Adresse mail: pseudo123@gmail.com</li>
                <li>Nom RP: John</li>
                <li>Prénom RP: Dupont</li>
                <li>Mot de passe: **********</li>
            </ul>
        </div>
    </div>
</div>
@endsection