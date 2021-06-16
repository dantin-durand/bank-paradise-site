@extends('layouts.dashboard')

@section('content')
<div class="container account admin">
    <div class="account__title">
        <h1>Espace administrateur</h1>
        <a href="/admin/addnews" class="btn btn-full">Ajouter un article</a>
    </div>
    <div class="admin__container">
        <x-navbar-admin activePage="news" />
        <table class="card">
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
                    <td>12/02/2021</td>
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
                <div style="display: flex; justify-content: center;">
                    {{ $articlesList->links() }}
                </div>

            </tbody>
        </table>
    </div>
</div>
@endsection