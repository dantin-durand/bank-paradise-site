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
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.356464221063!2d2.360851416019276!3d48.870480779288705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0950555883%3A0x25e6ea66d950d9ec!2s19%20Rue%20Yves%20Toudic%2C%2075010%20Paris!5e0!3m2!1sfr!2sfr!4v1622667036116!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
</main>
@endsection