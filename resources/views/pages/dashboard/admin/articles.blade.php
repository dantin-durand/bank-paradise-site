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
                        <a href="#"><i class="fas fa-eye"></i></a>
                        <a href="#"><i class="fas fa-pen"></i></a>
                        <a href="{{ url('/admin/news', [$article->id]) }}" onclick="event.preventDefault();document.getElementById('delete-article-form-{{$article->id}}').submit();" class="color-error"><i class="fas fa-trash"></i></a>
                        <form style="display: none;" method="POST" id="delete-article-form-{{$article->id}}" action="{{ url('/admin/news', [$article->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection