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
                </tr>
            </thead>
            <tbody>

                @foreach ( $subscriptions as $subscription)<tr>
                    <td>{{ $subscription->user->email }}</td>
                    <td>{{ date_format($subscription->created_at, 'd/m/Y') }}</td>
                    <td><code>{{ $subscription->stripe_plan }}</code></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $subscriptions->links('vendor.pagination.default') }}
    </div>
</div>
@endsection