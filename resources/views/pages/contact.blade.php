@extends('layouts.default')

@section('title', 'Contact')
@section('description', "Page pour contacter le service client de Paradise-Bank")

@section('content')
<header class="header__container">
    <h1 class="title">Contact</h1>
</header>
<main class="contact__container">
    <form method="POST" action="/send-mail" class="card">
        @csrf
        <div class="contact__first-part">
            <input class="input" type="text" name="firstname" id="" placeholder="Nom*" require />
            <input class="input" type="text" name="lastname" id="" placeholder="Prénom*" require />
            <input class="input" type="text" name="object" id="" placeholder="Objet" require />
            <input class="input" type="text" name="email" id="" placeholder="Email" require />
        </div>
        <textarea name="body" id="" placeholder="Message"></textarea>
        <button class="btn btn-full btn-large">Envoyer</button>
    </form>

    <section class="contact-information__section">

        <div>
            <h2>Coordonnées</h2>
            <ul>
                <li>
                    <img src="/img/adress_icon.svg" alt="">
                    <p>{{ $address }}</p>
                </li>
                <li>
                    <img src="/img/phone_icon.svg" alt="">
                    <p>{{ $phone }}</p>
                </li>
                <li>
                    <img src="/img/mail_icon.svg" alt="">
                    <p>{{ $mail }}</p>
                </li>
            </ul>
        </div>
        <div>
            <div id="mapgoogle"></div>
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.356464221063!2d2.360851416019276!3d48.870480779288705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0950555883%3A0x25e6ea66d950d9ec!2s19%20Rue%20Yves%20Toudic%2C%2075010%20Paris!5e0!3m2!1sfr!2sfr!4v1622667036116!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
        </div>
    </section>
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ $api_key }}&callback=initMap">
    </script>
    <script>
        let map;
        let marker;
        const lat = '{{ $lat }}';
        const lng = '{{ $lng }}';
    
        function initMap() {
            const position = {
                lat: Number(lat),
                lng: Number(lng)
            };
    
            map = new google.maps.Map(document.getElementById("mapgoogle"), {
                center: position,
                zoom: 8,
            });
            marker = new google.maps.Marker({
                position: position,
                map: map,
            });
        }
    </script>
</main>
@endsection