@extends('layouts.auth')

@section('content')
<div class="auth__container">
    <form id="register-form" method="POST" action="{{ route('admin.users.update', $userInfo->id) }}" class="card">
        <h2>Modification</h2>
        @csrf
        {{ method_field('PUT') }}
        <div class="auth__inputs-container">
            <div class="auth__input-container">
                <input id="firstname" class="input" type="text" name="firstname" value="{{ $userInfo->firstname }}" required autocomplete="firstname" autofocus placeholder="{{ __('Prénom') }}">

                @error('firstname')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="lastname" class="input" type="text" name="lastname" value="{{ $userInfo->lastname }}" required autocomplete="lastname" autofocus placeholder="{{ __('Nom') }}">

                @error('lastname')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="email" class="input" type="email" name="email" value="{{ $userInfo->email }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">

                <input id="newpassword" class="input" type="password" name="password" value="{{ old('password')}}" required autocomplete="new-newpassword" placeholder="{{ __('New Password') }}">

                @error('newpassword')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">

                <input id="password-confirm" type="password" name="password_confirmation" value="" class="input" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">

            </div>
                @if (auth()->user()->is_admin)
                <label for="is_admin"><input type="checkbox" name="is_admin" id="is_admin" {{ $userInfo->is_admin ? " checked" : ""}}> Administrateur</label>
                @endif
            <div style="display: flex; justify-content: space-between">

                <a href="{{ URL::previous() }}" class="btn btn-line btn-large">
                    Retour
                </a>

                <button type="submit" class="btn btn-full btn-large">
                    Modifier
                </button>
            </div>
        </div>
    </form>
</div>
@endsection