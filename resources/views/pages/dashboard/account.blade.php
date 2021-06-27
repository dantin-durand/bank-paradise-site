@extends('layouts.dashboard')

@section('title', 'Compte')
@section('description', "Les détails du compte d'un utilisateur")

@section('content')
<div class="container account">

    @if (Auth::User()->is_admin === 1 && $is_admin_page === 1)
    <a href="{{ route('admin.users') }}" class="back-btn"><i class="fas fa-chevron-left"></i> retour</a>
    @endif
    <div class="account__title">

        @if (Auth::User()->is_admin === 1 && $is_admin_page === 1)
        <h1>Compte de {{ $userDetails->firstname }}</h1>
        @elseif (Auth::User()->is_admin === 1 && $is_admin_page !== 1)
            <h1>Compte</h1>
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
                    <p>Formule actuelle : {{ $planDetails->name }} ({{ number_format($planDetails->price / 100, 2, ',', ' ') }} €)</p>
                    <p>Depuis le : {{  date_format($userDetails->subscriptions[0]->created_at, 'd/m/Y') }}</p>
                    @if (isset($userDetails->subscriptions[0]->ends_at))
                        <p>Prend fin le : {{  date_format($userDetails->subscriptions[0]->ends_at, 'd/m/Y') }}</p>
                    @endif
                </div>
                <div>
                    @if (Request::url() == route('account'))
                    <a class="btn btn-line" href="{{ $userDetails->billingPortalUrl(Request::url()) }}">Gérer mon abonnement</a>
                    @else 
                    <a class="btn btn-line" href="{{ $userDetails->billingPortalUrl(Request::url()) }}">Gérer l'abonnement</a>
                    @endif
                </div>
            @else
            <br>
                @if (Request::url() == route('account'))
                    <a href="{{route('register.step2')}}" class="btn btn-large btn-full">Choisir un abonnement</a>
                @else
                <p>Aucun abonnement</p>
                @endif
            @endif
        </div>
        <div class="account__informations card">

        <div>
                <h2>Informations</h2>
                @if (Auth::User()->is_admin === 1 && isset($is_admin_page))
                <a class="btn" href="{{ route('admin.users.edit', [$userDetails->id]) }}">Modifier</a>
                @else
                <a class="btn" href="{{ route('settings') }}">Modifier</a>
                @endif
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

