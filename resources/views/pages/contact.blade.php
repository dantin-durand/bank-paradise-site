@extends('layouts.default')

@section('content')
<header class="header__container">
    <h1 class="title">Contact</h1>
</header>
<main class="contact__container">
    <form action="" class="card">
        <div class="contact__first-part">
            <input class="input" type="text" name="" id="" placeholder="Nom*" require />
            <input class="input" type="text" name="" id="" placeholder="Prénom*" require />
            <input class="input" type="text" name="" id="" placeholder="Adresse mail*" require />
            <input class="input" type="text" name="" id="" placeholder="Objet" require />
        </div>
        <textarea name="" id="" placeholder="Message"></textarea>
        <button class="btn btn-full btn-large">Envoyer</button>
    </form>

    <section class="contact-information__section">

        <div>
            <h2>Coordonnées</h2>
            <ul>
                <li>
                    <img src="/img/adress_icon.svg" alt="">
                    <p>19 rue Yves Toudic<br>75010 Paris</p>
                </li>
                <li>
                    <img src="/img/phone_icon.svg" alt="">
                    <p>01 45 69 86 30</p>
                </li>
                <li>
                    <img src="/img/mail_icon.svg" alt="">
                    <p>support@bank-paradise.com</p>
                </li>
            </ul>
        </div>
    </section>
</main>
@endsection