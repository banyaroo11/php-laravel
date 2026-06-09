@extends('layouts.app')
@section('content')
    <section class="p-5 pt-3">
        <h1 class="fs-2">{{ $article['title'] }}
            <span class="fs-6 mt-2 d-block text-muted">{{ $article['created_at']->diffForHumans() }}</span>
            <span class="fs-5 mt-2 d-block">{{ $article['body'] }}</span>
        </h1>
        <form method="POST" action={{ route("articles.delete", ['id' => $article['id']]) }}>
            <button type="submit" name="submit" class="btn btn-danger text-white">Delete</button>
        </form>
    </section>
@endsection
