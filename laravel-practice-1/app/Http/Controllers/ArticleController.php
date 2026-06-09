<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function details(int $id)
    {
        $article = Article::findOrFail($id);

        return view('articles.details', [
            'article' => $article
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get')) {

            $categories = [
                ['id' => 1, 'type' => 'Local'],
                ['id' => 2, 'type' => 'International']
            ];

            return view('articles.create', [
                'categories' => $categories
            ]);

        } else if ($request->isMethod('post')) {

            $validator = validator($request->all(), [
                'title' => 'required',
                'body' => 'required',
                'category_id' => 'required'
            ]);
            
            if ($validator->fails()) {
                return back()->withErrors($validator);
            } 

            $new_article = new Article();
            $new_article->title = $request->title;
            $new_article->body = $request->body;
            $new_article->category_id = $request->category_id;
            $new_article->save();

            return redirect(route('articles.index'));

        }
    }
}
