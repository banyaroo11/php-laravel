<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Constants\GeneralConst;
use Illuminate\Pagination\Paginator;

class ArticleController extends Controller
{
    public function index() 
    {
        $articles = Article::latest()->paginate(GeneralConst::PAGINATION);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function details(int $id)
    {
        $article = Article::with('comments.user')->find($id);

        // return $article->comments;

        return view('articles.details', [
            'article' => $article,
            'comments' => $article->comments,
        ]);

    }
}
