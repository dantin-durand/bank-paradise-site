@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container add-news__container">
        <x-navbar-admin activePage="news" />
        <form class="card" method="POST" action="{{ route('createArticle') }}" enctype="multipart/form-data">
            @csrf
            <div class="auth__input-container">
                <input id="title" class="input" type="text" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Titre">
                @error('title')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="banner" type="file" class="" name="banner" value="{{ old('banner') }}" autocomplete="image">
                @error('banner')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <textarea name="body" id="body" placeholder="Contenu..."></textarea>
                @error('body')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-full" type="submit">Créer</button>
        </form>
    </div>
</div>
@endsection