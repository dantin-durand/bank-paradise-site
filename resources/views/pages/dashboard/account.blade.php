@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <div class="account__title">
        <h1>Compte</h1>
        @if (Auth::User()->is_admin === 1 && Request::url() == route('account'))
            <a class="btn btn-full" href="/admin/users">Mode admin</a>
        @endif
    </div>
    <div class="account__container">
        <div class="account__abonnement card">
            <div>
                <h2>Abonnement</h2>
                {{-- <a href="/register/step2" class="btn btn-full">Changer de formule</a> --}}
             </div>
             <p>Request::url(): {{ Request::url() }}</p>
             <p>route('account'): {{ route('account') }}</p>
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
                    <a class="btn btn-line" href="{{ $userDetails->billingPortalUrl(Request::url()) }}">Gérer l'abonnement</a>
                    @else 
                    <a class="btn btn-line" href="{{ $userDetails->billingPortalUrl(Request::url()) }}">Gérer mon abonnement</a>
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