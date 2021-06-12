@extends('layouts.auth')

@section('content')
<div class="container payement__container">
    <h1 class="title t-center">Paiement</h1>
    <form class="card" method="post" id="payment-form">
        @csrf
        <div>
            <p><i>PRIX TTC</i></p>
            <h2>3.99€<span>/mois</span></h2>
            <p>formule: <strong>Communauté</strong></p>
        </div>
        <input type="hidden" name="formule" value="{{ app('request')->input('formule') }}">
        <br>
        <div class="auth__input-container">

            <input id="name" class="input" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nom') }}">

            @error('name')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <br>
        <div id="card-element">
            <!-- Elements will create input elements here -->
        </div>
        <br>
        <!-- We'll put the error messages in this element -->
        <div id="card-errors" role="alert"></div>
        <button type="submit" id="card-button" class="btn btn-large btn-full" data-secret="{{ $intent->client_secret }}">Payer</button>
        <!-- <a href="/register/step4" class="btn btn-large btn-full">Payer</a> -->
    </form>


    <x-register-progress-bar items="3" itemsMax="4" />
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_51IzzVJBQlJTYhI99hHScvWlR6gJcJSrDC5ze3jd5j3E6Lkx1UwXJi1tnvZJzcZvsuIMf4oz34fVVDKt2QYQF7CCs00utOOiKVF');
    const elements = stripe.elements();
    var style = {
        base: {
            color: "var(--main-color)",
        }
    };

    var cardElement = elements.create("card", {
        style: style
    });
    cardElement.mount("#card-element");

    const cardHolderName = document.getElementById('name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.on('change', ({
        error
    }) => {
        let displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');

    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        const {
            paymentMethod,
            error
        } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: {
                    name: cardHolderName.value
                }
            }
        );

        if (error) {
            console.log(error);
        } else {
            console.log(set);
        }
    });
</script>
@endsection