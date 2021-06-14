@extends('layouts.auth')

@section('content')
<div class="auth__container">
    <form id="register-form" method="POST" action="{{ route('register') }}" class="card">
        <h2>Inscription</h2>
        @csrf
        <div class="auth__inputs-container">
            <div class="auth__input-container">
                <input id="firstname" class="input" type="text" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus placeholder="{{ __('Prénom') }}">

                @error('firstname')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="lastname" class="input" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="{{ __('Nom') }}">

                @error('lastname')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">

                <input id="password" class="input" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">

                <input id="password-confirm" type="password" name="password_confirmation" class="input" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">

            </div>

            <div>

                <button type="submit" class="btn btn-full btn-large">
                    {{ __('Register') }}
                </button>
                <!-- <a href="/register/step2" class="btn btn-full btn-large">Inscription</a> -->

            </div>
        </div>
    </form>

    <x-register-progress-bar items=" 1" itemsMax="4" />
</div>
@endsection