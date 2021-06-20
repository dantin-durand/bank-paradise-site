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
        <div>
            <div class="prev__btn"></div>
            <div class="next__btn"></div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($latestNews as $news)
                    <div class="swiper-slide" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('{{$news->banner}}');">
                        <a href="#">
                            <div>
                                <p>{{ date_format($news->created_at, 'd/m/Y') }}</p>
                                <h1>{{$news->title}}</h1>
                            </div>
                        </a>
                        </div>

                    @endforeach
            </div>
        </div>

        </div>






    </section>
</main>
@endsection