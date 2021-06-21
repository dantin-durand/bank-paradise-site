@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="card payment-container">
        <h1 class="color-success"><i class="fas fa-check-circle"></i></h1>
        <h1>Paiement effectué avec succès.</h1>
        <p>Vous allez être redirigé.</p>
        <span><a href="{{ route('register.step4') }}">Cliquez ici si vous n'êtes pas redirigé après 3sec</a></span>
    </div>
</div>
<script>
    setTimeout(() => {
        window.location.href = "{{ route('register.step4') }}";
    }, 3000);
</script>
@endsection