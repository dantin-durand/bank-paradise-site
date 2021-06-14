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
                @foreach ($userList as $user)<tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="#">{{ $user->email }}</a> </td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="#"><i class="fas fa-eye"></i></a>
                        <a href="#"><i class="fas fa-user-edit"></i></a>
                        <a href="{{ url('/admin/users', [$user->id]) }}"" onclick="event.preventDefault();document.getElementById('delete-user-form-{{$user->id}}').submit();" class="color-error"><i class="fas fa-trash"></i></a>
                        <form style="display: none;" method="POST" id="delete-user-form-{{$user->id}}" action="{{ url('/admin/users', [$user->id]) }}"">
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