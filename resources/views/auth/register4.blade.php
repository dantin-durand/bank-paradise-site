@extends('layouts.default')

@section('content')
<div class="auth__container">
    <form method="POST" class="card">
        <h2>Création de<br>la communauté</h2>
        @csrf
        <div class="auth__inputs-container">
            <div class="auth__input-container">

                <input id="name" class="input" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom de la communauté">

                @error('name')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="auth__input-container">
                <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Description">

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <a href="/dashboard" class="btn btn-full btn-large">Créer</a>
            </div>
        </div>
    </form>

    <x-register-progress-bar items="4" itemsMax="4" />
</div>
@endsection