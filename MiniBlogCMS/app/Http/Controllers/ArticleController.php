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
}
