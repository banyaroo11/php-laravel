@extends('layouts.app')
@section('content')
    <section class="container py-4">
        <h2>Articles</h2>
        @forelse ($articles as $article)
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="h5 d-flex justify-content-between align-items-center">
                        <span class="d-block">{{ $article->title }}</span>
                        <small class="d-block text-muted">{{ $article->created_at->diffForHumans() }}</small>
                    </h3>

                    <p class="mt-3">{{ Str::limit($article->body, 200) }}</p>

                    <p>❤️ {{ $article->love }}</p>

                    <a href="{{ route('articles.details', ['id' => $article->id]) }}" class="btn btn-primary mt-3">Read More</a>
                </div>
            </div>
        @empty
            <div class="alert alert-info mt-4">
                No posts found.
            </div>
        @endforelse
        <div class="mt-4 d-flex">{{ $articles->links() }}</div>
    </section>
@endsection
