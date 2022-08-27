<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get seven latest published articles and return to home page view
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles = Article::where('published', 1)
        ->whereDate('published_at', '<=', now())
        ->orderByDesc('published_at')
        ->limit(7)
        ->get();

        return view('/home', [
            'articles' => $articles,
        ]);

    }
}
