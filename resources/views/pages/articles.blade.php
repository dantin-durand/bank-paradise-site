@extends('layouts.default')

@section('content')
<header class="header__container">
    <h1 class="title">News</h1>r
    <form action="{{ route('news') }}" method="GET">
        <input type="search" name="search" value="{{ app('request')->input('search') }}" placeholder="Rechercher...">
        {{-- <button type="submit">Rechercher</button> --}}
    </form>
</header>
<main class="news__container">
    @if (sizeof($articlesList) == 0)
    <h1>Aucune News</h1>
    @else
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
    @endif
</main>
<div class="pagination" style="justify-content: center" >
    {{ $articlesList->links('vendor.pagination.default') }}
</div>
@endsection

