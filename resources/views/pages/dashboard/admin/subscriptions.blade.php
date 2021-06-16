@extends('layouts.dashboard')

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container">
        <x-navbar-admin activePage="users" />
        <table class="card">
            <thead>
                <tr>
                    <th>User email</th>
                    <th>Date de souscription</th>
                    <th>Reference Plan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $subscriptions as $subscription)<tr>
                    <td>{{ $subscription->user->email }}</td>
                    <td>{{ $subscription->subscriptionDate }}</td>
                    <td><code>{{ $subscription->stripe_plan }}</code></td>
                    <td>
                        <a href="{{ route('admin.user', [$subscription->user->id] ) }}"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.users.edit', [$subscription->user->id ]) }}"><i class="fas fa-user-edit"></i></a>
                        <a href="#" onclick="event.preventDefault();document.getElementById('delete-user-form-{{$subscription->user->id}}').submit();" class="color-error"><i class="fas fa-trash"></i></a>
                        <form style="display: none;" method="POST" id="delete-user-form-{{$subscription->user->id}}" action="{{ route('admin.users.delete', [$subscription->user->id]) }}"">
                            @csrf
                            {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $subscriptions->links() }}
    </div>
</div>
@endsection