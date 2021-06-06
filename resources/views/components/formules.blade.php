@props(['path', 'type'])

<section class="formules__sections">
    <h1 class="title t-center">Formules</h1>
    <div>

        <div class="formules__item">
            <div>
                <h1>1.99€</h1>
                <p>Nouvel arrivant</p>
                <div class="formule_spacer"></div>
                <ul>
                    <li>Jusqu'à <strong>10 membres</strong></li>
                    <li>Transactions <strong>illimitées</strong></li>
                    <li>Historique des transactions</li>
                </ul>
            </div>
            <div>
                @if ($type === 'buy')
                <a href="{{ $path }}?formule=1" class="btn btn-large btn-full">Sélectionner</a>
                @else
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
                @endif
            </div>
        </div>
        <div class="formules__item recommanded">
            <div>
                <h1>3.99€</h1>
                <p>Communauté</p>
                <div class="formule_spacer"></div>
                <ul>
                    <li>Jusqu'à <strong>30 membres</strong></li>
                    <li>Transactions <strong>illimitées</strong></li>
                    <li>Historique des transactions</li>
                    <li><strong>3 Comptes entreprises</strong> par <strong>membre</strong></li>
                </ul>
            </div>
            <div>
                @if ($type === 'buy')
                <a href="{{ $path }}?formule=2" class="btn btn-large btn-full">Sélectionner</a>
                @else
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
                @endif
            </div>
        </div>
        <div class="formules__item">
            <div>
                <h1>1.99€</h1>
                <p>Nouvel arrivant</p>
                <div class="formule_spacer"></div>
                <ul>
                    <li>Membres<strong>illimités</strong></li>
                    <li>Transactions <strong>illimitées</strong></li>
                    <li>Transactions <strong>Extracommunautaires</strong></li>
                    <li>Historique des transactions</li>
                    <li>Compte entreprise <strong>illimité</strong></li>
                </ul>
            </div>
            <div>
                @if ($type === 'buy')
                <a href="{{ $path }}?formule=3" class="btn btn-large btn-full">Sélectionner</a>
                @else
                <a href="/services" class="btn btn-large btn-full">Sélectionner</a>
                @endif
            </div>
        </div>
    </div>
</section>