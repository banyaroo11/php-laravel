<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return redirect()->route('articles.index');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::get('/articles/details/{id}', [ArticleController::class, 'details'])->name('articles.details');

Route::get('/articles/more/{id}', function ($id) {
    return redirect()->route('articles.details', ['id' => 1]);
});

Route::match(['get', 'post'], '/articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('/articles/delete/{id}', [ArticleController::class, 'delete'])->name('articles.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/articles', function() {
    return 'Hello Articles';
});

Route::get('/articles/details/{id}', function(int $id) {
    return "Details of article $id!";
})->name('article.details');
*/