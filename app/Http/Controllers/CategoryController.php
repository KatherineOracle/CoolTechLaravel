<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    /**
     * Display get all the articles for specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //get the category by slug
        $category = Category::where('slug', $request->slug)
               ->orderBy('title')
               ->first();

        //get the articles with matching category id
        if($category){
        $articles = Article::where('category_id', $category->id)
               ->where('published', 1)
               ->whereDate('published_at', '<=', now())
               ->orderByDesc('published_at')
               ->get();
        } else {
            $articles = [];
        }

        //return view
        return view('/category', [
            'category' => $category,
            'articles' => $articles
        ]);
    }

}
