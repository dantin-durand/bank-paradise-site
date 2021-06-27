@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="card payment-container">
        <h1 class="color-success"><i class="fas fa-check-circle"></i></h1>
        <h1>Paiement effectué avec succès.</h1>
        <p >
            Voici les détails de votre commande:
        </p>
        <hr />
        <p style="margin: 20px 0px">Abonnement : {{ $plan->name }}</p>
        <p style="margin: 20px 0px">Prix : {{ number_format($plan->price / 100, 2, ',', ' ') }} €/mois</p>
        <hr />
        <br>
        <span style="text-align: center; width: 100%"><a href="{{ route('register.step4') }}" class="btn btn-large btn-full" style="margin: auto">Continuer</a></span>
    </div>
</div>
@endsection
