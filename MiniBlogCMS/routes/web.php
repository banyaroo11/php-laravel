<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ArticleController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::middleware('auth')->prefix('user')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // User management routes
    Route::match(['get', 'post'], '/create', [UserController::class, 'createUser'])->name('user.create');
    Route::match(['get', 'post'], '/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function() {
    Route::get('/users', [UserController::class, 'getUserList'])->name('user.list');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function() {
    return redirect()->route('home');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');