@extends('layouts.default')

@section('content')
<header class="header__container">
    <h1 class="title">News</h1>
    <input type="search" name="" id="" placeholder="Rechercher...">
</header>
<main class="news__container">
    @foreach ($articlesList as $article)
    <a href="/news/{{$article->id}}">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/200x400');">
            <div>
                <p>{{ $article->created_at }}</p>
                <h1>{{ $article->title }}</h1>
            </div>
        </div>
    </a>
    @endforeach

</main>
<div class="pagination" >
    {{ $articlesList->links() }}
</div>
@endsection