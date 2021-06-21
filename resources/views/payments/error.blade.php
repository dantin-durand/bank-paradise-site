@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="card payment-container">
        <h1>Eche de paiement</h1>
        <p><a href="{{ route('register.step2') }}" class="btn btn-full">Réessayer</a></p>
    </div>
</div>

@endsection