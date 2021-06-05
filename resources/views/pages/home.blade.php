@extends('layouts.home')

@section('content')
<header class="home__header__container">
    <h1>Gérez et automatisez vos transactions <span>roleplay</span></h1>
    <a href="/services" class="btn btn-large">Découvrir</a>
</header>
<main>
    <section class="services__section">
        <img src="/img/steps/transactions.svg" alt="Transactions Rôleplay">
        <div>
            <h1>Transactions Rôleplay</h1>
            <p>Effectuez des transactions intracommunautaires ou extracommunautaires avec l'offre évasion. Payez avec une monnaie en temps réel, consultez vos transactions.</p>
            <a href="/services" class="btn btn-large btn-full">Découvrir</a>
        </div>
    </section>
    <section class="services__section">
        <img src="/img/steps/admin.svg" alt="Administration et gestion
de la communauté">
        <div>
            <h1>Administration et gestion
                de la communauté</h1>
            <p>En tant que fondateur d'une communauté, vous avez la possibilité de contrôler et de supprimer des virements ou des membres. Vous avez également accès au registre des joueurs signalés par d'autres communautés.</p>
            <a href="/services" class="btn btn-large">Découvrir</a>
        </div>
    </section>
    <x-formules path="" type="home" />
    <section class="news-slide__sections">
        <h1 class="title t-center">News</h1>
        <div class="swiper-container">

            <div class="swiper-wrapper">
                <a href="/">
                    <div class="swiper-slide" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
                        <div>
                            <p>20/04/2021</p>
                            <h1>Mise en place d'un chat</h1>
                        </div>
                </a>
            </div>
        </div>



        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>


        </div>
    </section>
</main>
@endsection