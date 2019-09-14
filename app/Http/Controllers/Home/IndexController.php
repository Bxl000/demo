<?php

namespace App\Http\Controllers\Home;

use App\Models\Home\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function showIndex()
    {
        $dataAllList = Article::with('thumbnail')->orderBy('id', 'desc')->simplePaginate(10);
        return view('home.index', compact('dataAllList'));
    }
}
