@extends('layouts.default')

@section('title', 'Article')
@section('description', "Page avec les détails d'un article")

@section('content')
<header class="article__header" style="background:linear-gradient(0deg, rgba(214,16,22,0.4640231092436975) 0%, rgba(214,16,22,0) 100%), url('{{ $articleDetails->banner }}');">
    <h1 class="title">{{ $articleDetails->title }}</h1>
</header>
<main class="article__container">
    <p class="article__date">{{ $articleDetails->user->firstname }}, le: {{ date_format($articleDetails->created_at, 'd/m/Y') }}</p>

    <div class="ck-content">  
            {!! $articleDetails->body !!}
    </div>
</main>
@endsection 