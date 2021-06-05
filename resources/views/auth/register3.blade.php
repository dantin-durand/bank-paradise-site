@extends('layouts.default')

@section('content')
<div class="container payement__container">
    <h1 class="title t-center">Paiement</h1>
    <div class="card ">
        <p><i>PRIX TTC</i></p>
        <h2>3.99€<span>/mois</span></h2>
        <p>formule: <strong>Communauté</strong></p>
        <div class="inputs-group">
            <p>STRIPE ICI</p>
        </div>
        <a href="/register/step4" class="btn btn-large btn-full">Payer</a>
    </div>


    <x-register-progress-bar items="3" itemsMax="4" />
</div>
@endsection