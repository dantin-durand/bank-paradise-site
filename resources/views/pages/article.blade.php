@extends('layouts.default')

@section('content')
<header class="article__header" style="background:linear-gradient(0deg, rgba(214,16,22,0.4640231092436975) 0%, rgba(214,16,22,0) 100%), url('https://via.placeholder.com/1080x720');">
    <h1 class="title">{{ $articleDetails->title }}</h1>
</header>
<main class="article__container">
    <p class="article__date">{{ $articleDetails->created_at}}</p>
    <p>{{ dd($articleDetails)}}</p>
    <div class="ck-content">  
            {!! $articleDetails->body !!}
    </div>
</main>
@endsection 