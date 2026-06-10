<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $comment = new Comment();
            $comment->article_id = $request->article_id;
            $comment->user_id = auth()->user()->id;
            $comment->comment = htmlspecialchars(trim($request->comment));
            $comment->save();

            return 'ok';
        } else {
            return 'not ok';
        }
    }
}
