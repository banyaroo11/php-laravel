@extends('layouts.app')
@section('content')
    <section class="p-5">
        <h1 class="fs-3">Create News</h1>
        <form method="POST" action="{{ route('articles.create') }}" 
        class="d-flex flex-column align-items-start justify-content-start" 
        style="width: 450px;">
            @csrf
            <input name="title" type="text" placeholder="Enter News Title" class="form-control">
            <textarea name="body" placeholder="Enter News Body" class="mt-2 form-control"></textarea>
            <select name="category_id" class="mt-2">
                @foreach ($categories as $category)
                <option value={{ $category['id'] }}>{{ $category['type'] }}</option>
                @endforeach
            </select>
            <button type="submit" name="submit" class="btn btn-primary text-white mt-2">Submit</button>
        </form>
    </section>
@endsection