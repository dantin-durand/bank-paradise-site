@extends('layouts.dashboard')

@section('title', 'Article')
@section('description', 'Ajouter un article')

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container add-news__container">
        <x-navbar-admin activePage="news" />


        <form
            class="card"
            method="POST"
            action="{{ isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.create') }}"
            enctype="multipart/form-data"
        >
            {{ isset($article) ? method_field('PUT') : ""}}
            @csrf
            <div class="auth__input-container">
                <input id="title" class="input" type="text" name="title" value="{{ isset($article) ? $article->title : old('title') }}" required autocomplete="title" autofocus placeholder="Titre">
                @error('title')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <input id="banner" type="file" class="" name="banner" value="{{ old('banner') }}" autocomplete="image">
                <span>{{ isset($article) ? "N'ajoutez pas d'image si vous souhaitez conserver l'actuelle." : ""}}</span>
                @error('banner')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="auth__input-container">
                <span>Date de publication:</span>
                <input id="releaseDate" class="input" type="date" name="releaseDate" value="{{ isset($article) ? date('Y-m-d', strtotime($article->release_date)) : old('releaseDate') }}" required >
                @error('releaseDate')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="auth__input-container">
                <textarea name="body" id="body" placeholder="Contenu...">{{ isset($article) ? $article->body : old('body') }}</textarea>
                @error('body')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button class="btn btn-full" type="submit">{{isset($article) ? "Modifier" : "Créer"}}</button>
        </form>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ), {
        removePlugins: [ 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'CKFinder', 'EasyImage', 'MediaEmbed' ]
    } )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor.builtinPlugins.map( plugin => { console.log(plugin.pluginName)  });
</script>
@endsection