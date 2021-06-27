@extends('layouts.dashboard')

@section('title', 'Abonnements')
@section('description', "Liste des abonnements du point de vue de l'administrateur")

@section('content')
<div class="container account">
    <h1>Espace administrateur</h1>
    <div class="admin__container">
        <x-navbar-admin activePage="subscriptions" />
        <div class="table-container">
        <table class="card">
            <thead>
                <tr>
                    <th>User email</th>
                    <th><a href="/admin/subscriptions?filter=subscription">Date de souscription</a></th>
                    <th>Reference Plan</th>
                    <th><a href="/admin/subscriptions?filter=active">Status</a></th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $subscriptions as $subscription)<tr>

                    <td><a href="{{ $subscription->user->billingPortalUrl(Request::url()) }}">{{ $subscription->user->email }}</a></td>
                    <td>{{ date_format($subscription->created_at, 'd/m/Y') }}</td>
                    <td><code>{{ $subscription->stripe_plan }}</code></td>
                    <td>{{ $subscription->stripe_status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $subscriptions->links('vendor.pagination.default') }}
        </div>
    </div>
</div>
@endsection