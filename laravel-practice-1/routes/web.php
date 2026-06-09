<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/details/{id}', [ArticleController::class, 'details'])->name('article.details');

Route::get('/articles/more/{id}', function ($id) {
    return redirect()->route('article.details', ['id' => 1]);
});

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