<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{

    /**
     * Find published articles with specified tag and return with view.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $tag = Tag::where('slug', $request->slug)
               ->orderBy('title')
               ->first();

        if(isset($tag)){
            $articles = $tag->articles()
            ->where('published', 1)
            ->whereDate('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get();
        } else {
            $articles = [];
        }

        return view('/tag', [
            'tag' => $tag,
            'articles' => $articles
        ]);
    }

}
