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
                @for ($i = 0; $i < 6; $i++)<tr>
                    <td>#12{{$i}}</td>
                    <td><a href="#">Mise en place d'un chat</a> </td>
                    <td>12/02/2021</td>
                    <td>
                        <a href="#"><i class="fas fa-eye"></i></a>
                        <a href="#"><i class="fas fa-pen"></i></a>
                        <a href="#" class="color-error"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection