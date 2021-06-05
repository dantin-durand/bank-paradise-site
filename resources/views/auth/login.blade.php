@extends('layouts.default')

@section('content')
<div class="auth__container">
    <form method="POST" action="{{ route('login') }}" class="card">
        <h2>Connexion</h2>
        @csrf
        <div class="auth__inputs-container">

            <div class="auth__input-container">

                <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="auth__input-container">

                <input id="password" class="input" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div>

                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label for="remember">
                    {{ __('Remember Me') }}
                </label>

            </div>

            <div>

                <button type="submit" class="btn btn-full btn-large">
                    {{ __('Login') }}
                </button>



            </div>
        </div>
    </form>
</div>
@endsection