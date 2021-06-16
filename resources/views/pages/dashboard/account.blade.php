@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <div class="account__title">
        <h1>Compte</h1>
        @if (Auth::User()->is_admin === 1)
            <a class="btn btn-full" href="/admin/users">Mode admin</a>
        @endif
    </div>
    <div class="account__container">
        <div class="account__abonnement card">
            <div>
                <h2>Abonnement</h2>
                {{-- <a href="/register/step2" class="btn btn-full">Changer de formule</a> --}}
             </div>
            @if(isset($userDetails->subscriptions[0]))
                <div>
                    <p>Formule actuelle: {{ $userDetails->subscriptions[0]->stripe_id }}</p>
                </div>
                {{-- <div>
                    <button class="btn btn-line">Annuler l'abonnement</button>
                    <button class="btn btn-line">Mettre en pause</button>
                </div> --}}
            @else
            <br>
                <a href="{{route('register.step2')}}" class="btn btn-large btn-full">Choisir un abonnement</a>
            @endif
        </div>
        <div class="account__informations card">
            
        <div>
                <h2>Informations</h2>
                <a class="btn" href="{{ url('/account/settings') }}">Modifier</a>
            </div>
            <ul>
                <li>Adresse mail: {{ $userDetails->email }}</li> 
                <li>Nom RP: {{ $userDetails->lastname }}</li>
                <li>Prénom RP: {{ $userDetails->firstname }}</li>
                <li>Mot de passe: **********</li>
            </ul>
        </div>
    </div>
</div>
@endsection