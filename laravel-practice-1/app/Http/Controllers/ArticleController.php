<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => [
                ['id' => 'TVNews-1', 'title' => 'New species of snake, which is endemic to Yangon, was found near Sule Pagoda'],
                ['id' => 'TVNews-2', 'title' => 'An earthquake with 7.6 magnitude shook Phillipines yesterday']
            ]
        ]);
    }

    public function details($id)
    {
        return "Details of Article $id";
    }
}
