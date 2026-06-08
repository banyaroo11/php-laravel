<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', function() {
    return 'Article List!';
});

Route::get('/articles/details/{id}', function(int $id) {
    return "Details of article $id!";
});
