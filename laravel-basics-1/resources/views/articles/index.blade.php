@extends('layouts.app')
@section('content')
    <h1 class="text-center">Latest News</h1>
    <section class="p-5 pt-3">
        <h2>International News<a href="{{ url('/articles/create') }}" class="d-block text-success text-start mt-2 fs-6">+ Add News</a></h2>
        @if(session('success'))
            <p class="alert alert-success fw-bold">{{session('success')}}</p>
        @endif
        <ul class="border-bottom-1">
            @foreach ($articles as $article)
                <li class="d-flex flex-column align-items-start justify-content-start mt-4">
                    <h3 class="fs-4">
                        <a href="{{ url('/articles/details/' . $article['id']) }}">{{ $article['title'] }}</a>
                        <span class="fs-6 mt-2 d-block text-muted">{{ $article['created_at']->diffForHumans() }}</span>
                        <span class="fs-6 mt-2 d-block">{{ $article['body'] }}</span>
                    </h3>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">{{ $articles->links() }}</div>
    </section>
@endsection
