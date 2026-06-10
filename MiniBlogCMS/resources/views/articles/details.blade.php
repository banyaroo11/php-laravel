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
                <form method="POST" action="{{ route('comments.create') }}"> 
                    <input type="hidden" name="article_id" value={{ $article->id }}>
                    <textarea style="resize: none;" class="mt-4 form-control" name="comment" placeholder="Enter Your Comment."></textarea>
                    @auth
                        <button type="submit" class="btn btn-primary mt-2">Comment</button>
                    @endauth
                    @guest
                        <p>Please <a href="{{ route('login') }}">login</a> to comment as a member.</p>
                    @endguest
                </form>
                <div class="d-flex flex-column align-items-start justify-content-start mt-4">
                    @forelse ($comments as $comment)
                        <article class="fs-5 fw-semibold border-bottom border-1 py-2 w-100">
                            {{ $comment->user->name }}
                            <span class="fs-6 text-secondary">{{ $comment->created_at->diffForHumans() }}</span>
                            <span class="ms-4 fw-normal d-block">{{$comment->comment}}</span>
                        </article>
                    @empty
                        <p>Be the first one to comment</p>
                    @endempty
                </div>
            </div>
        </div>
    </section>
@endsection
