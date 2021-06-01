@extends('layouts.default')

@section('content')
<header class="header__container">
    <h1 class="title">News</h1>
    <input type="search" name="" id="" placeholder="Rechercher...">
</header>
<main class="news__container">
    <a href="/news/1">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
            <div>
                <p>20/04/2021</p>
                <h1>Mise en place d'un chat</h1>
            </div>
        </div>
    </a>
    <a href="/news/1">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
            <div>
                <p>20/04/2021</p>
                <h1>Mise en place d'un chat</h1>
            </div>
        </div>
    </a>
    <a href="/news/1">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
            <div>
                <p>20/04/2021</p>
                <h1>Mise en place d'un chat</h1>
            </div>
        </div>
    </a>
    <a href="/news/1">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
            <div>
                <p>20/04/2021</p>
                <h1>Mise en place d'un chat</h1>
            </div>
        </div>
    </a>
</main>
@endsection