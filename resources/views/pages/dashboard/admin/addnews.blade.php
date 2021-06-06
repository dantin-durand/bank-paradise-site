@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container add-news__container">
        <x-navbar-admin activePage="news" />
        <form class="card">
            <div class="auth__input-container">
                <input id="title" class="input" type="text" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Titre">
            </div>
            <div class="auth__input-container">
                <input type="file" name="banner" id="banner">
            </div>
            <div class="auth__input-container">
                <textarea name="" id="" placeholder="Contenu..."></textarea>
            </div>
            <button class="btn btn-full">Créer</button>
        </form>
    </div>
</div>
@endsection