<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return 'List of Articles';
    }

    public function details($id)
    {
        return "Details of Article $id";
    }
}
