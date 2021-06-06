@extends('layouts.dashboard')

@section('content')
<div class="container dashboard">
    <h1>Bonjour {{ Auth::User()->name }}</h1>
    <section class="dashboard__actions-container">
        <div class="dashboard__solde">
            <h2>Soldes</h2>
            <div>
                <p>Total:</p>
                <h3>50 000 EUR</h3>
                <div class="spacer"></div>
                <ul>
                    <li>
                        <p>38 000 EUR - Compte courant</p>
                    </li>
                    <li>
                        <p>14 000 EUR - Compte LS Custom</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard__speed-actions">
            <div class="dashboard__payement-actions">
                <h2>Actions Rapides</h2>
                <div>
                    <button>Envoyer de l'argent</button>
                    <button>Payer un bien ou un service</button>
                </div>
            </div>
            <div class="dashboard__reply">
                <h2>Renvoyer</h2>
                <div>
                    @for ($i = 0; $i < 6; $i++) <div>
                        <img src="http://via.placeholder.com/50x50" alt="albert">
                        <p class="t-center"> Albert</p>
                </div>
                @endfor
            </div>
        </div>
</div>
</section>
<section class="dashboard__informations-container">
    <div>
        <div class="dashboard__statistiques">
            <h2>Statistiques</h2>
            <ul>
                <li>
                    <p>argents entrant:</p>
                    <p class="color-success">360000 EUR</p>
                </li>
                <li>
                    <p>argents sortant:</p>
                    <p class="color-error">310000 EUR</p>
                </li>
                <li>
                    <p>total:</p>
                    <p>50000 EUR</p>
                </li>
            </ul>
        </div>
        <div class="dashboard__cards">
            <h2>Cartes Bancaires</h2>
            <ul>
                <li>
                    <p>COMPTE COURANT</p>
                    <div>
                        <p>IBAN</p>
                        <p>CC3454-256-9654</p>
                    </div>
                </li>
                <li>
                    <p>COMPTE LS CUSTOM</p>
                    <div>
                        <p>IBAN</p>
                        <p>CC3454-256-9654</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="dashboard__recent-activity">
        <h2>Activités Récentes</h2>
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-error">Paiement</span> - oh non de l'argent en moins :(
                        </p>
                    </td>
                    <td>
                        <p class="color-error">-16231 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>28/07/2020</p>
                    </td>
                    <td>
                        <p>Albert MACHIN</p>
                        <p>
                            <span class="color-success">Argent Reçu </span> - Je suis un texte heureux ! :)
                        </p>
                    </td>
                    <td>
                        <p class="color-success">+2000 EUR</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
</div>

@endsection