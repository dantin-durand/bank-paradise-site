@extends('layouts.dashboard')

@section('title', 'Articles')
@section('description', "Liste des articles du point de vue de l'administrateur")

@section('content')
<div class="container account admin">
    <div class="account__title">
        <h1>Espace administrateur</h1>
        <a href="/admin/addnews" class="btn btn-full">Ajouter un article</a>
    </div>
    <div class="admin__container">
        <x-navbar-admin activePage="news" />
        <div class="table-container">
            @include('flash-message')
            <table class="card" style="widows: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Créer le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articlesList as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td><a href="#">{{ $article->title }}</a> </td>
                        <td>{{date_format($article->created_at, 'd/m/Y')}}</td>
                        <td>
                            
                            <a href="#" onclick="event.preventDefault();document.getElementById('toshow-article-form-{{$article->id}}').submit();">
                                <i class="{{$article->should_be_shown ? "fas fa-eye" : "fas fa-eye-slash"}}"></i>
                            </a>
                            <form style="display: none;" method="POST" id="toshow-article-form-{{$article->id}}" action="{{ route('admin.articles.toshow', [$article->id]) }}">
                                @csrf
                                {{ method_field('PUT') }}
                            </form>
    
                            <a href="{{ route('admin.articles.edit', [$article->id]) }}"><i class="fas fa-pen"></i></a>
                            
                            <a class="color-error" href="{{ url('/admin/news', [$article->id]) }}" onclick="event.preventDefault();document.getElementById('delete-article-form-{{$article->id}}').submit();"><i class="fas fa-trash"></i></a>
                            <form style="display: none;" method="POST" id="delete-article-form-{{$article->id}}" action="{{ url('/admin/news', [$article->id]) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
    
                </tbody>
            </table>
            <div style="display: flex; justify-content: center; margin-top: 40px;">
                        {{ $articlesList->links('vendor.pagination.default') }}
            </div>
        </div>

    </div>
</div>
@endsection