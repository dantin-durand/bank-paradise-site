@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container">
        <x-navbar-admin activePage="users" />
        <table class="card">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Adresse Mail</th>
                    <th>Inscription le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 6; $i++)<tr>
                    <td>#12{{$i}}</td>
                    <td><a href="#">pseudo123@gmail.com</a> </td>
                    <td>12/02/2021</td>
                    <td>
                        <a href="#"><i class="fas fa-eye"></i></a>
                        <a href="#"><i class="fas fa-user-edit"></i></a>
                        <a href="#" class="color-error"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection