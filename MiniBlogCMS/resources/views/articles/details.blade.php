@extends('layouts.app')
@section('content')
    <section class="container py-4">
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            ← Back to Articles
        </a>
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="h2 d-flex justify-content-between align-items-center">
                    <span>{{ $article->title }}</span>
                    <small class="text-muted fs-6">{{ $article->created_at->diffForHumans() }}</small>
                </h1>
                <p class="mt-3">❤️ {{ $article->love }}</p>
                <p class="mt-4">{{ $article->body }}</p>
                <form method="POST" action=""> 
                    <textarea style="resize: none;" class="mt-4 form-control" name="comment" placeholder="Enter Your Comment."></textarea>
                    @auth
                        <button type="submit" class="btn btn-primary mt-2">Comment</button>
                    @endauth
                    @guest
                        <p>Please <a href="{{ route('login') }}">login</a> to comment as a member.</p>
                    @endguest
                </form>
            </div>
        </div>
    </section>
@endsection
