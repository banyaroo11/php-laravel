@extends('layouts.app')
@section('content')
    <section class="bg-light text-center py-5">
        <div class="container">
            <h2 class="display-5 fw-bold">Welcome to My Blog</h2>
            <p class="lead text-muted">
                Read articles about Latest News, and Travelling.
            </p>
            <a href="{{ route('articles.index') }}" class="btn btn-primary btn-md mt-3">
                Browse Articles
            </a>
        </div>
    </section>
@endsection
