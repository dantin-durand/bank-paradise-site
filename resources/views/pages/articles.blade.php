@extends('layouts.default')

@section('content')
<header class="header__container">
    <h1 class="title">News</h1>
    <form action="{{ url('/search') }}" method="GET">
        <input type="search" name="search" id="" placeholder="Rechercher...">
        <button type="submit">Rechercher</button>
    </form>
</header>
<main class="news__container">
    @foreach ($articlesList as $article)
    <a href="/news/{{$article->id}}">
        <div class="news__item" style="background: linear-gradient(0deg, rgba(214,16,22,1) 0%, rgba(214,16,22,0) 100%), url('{{ $article->banner }}');">
            <div>
                <p>{{ date_format($article->created_at,'d/m/Y' )}}</p>
                <h1>{{ $article->title }}</h1>
            </div>
        </div>
    </a>
    @endforeach

</main>
<div class="pagination" style="justify-content: center" >
    {{ $articlesList->links('vendor.pagination.default') }}
</div>
@endsection

