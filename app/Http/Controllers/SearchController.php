<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Display resource listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = 	$request->query('s');
        $type = $request->query('type');

        $results = [];
        if( $search != ""){

        //determine which type of search the user wants to perform and creeat query
        switch($type){
            //tag search
            case 'tag':
                $results = Tag::where('title', 'like', '%' .  $search . '%')
                ->orderBy('title')
                ->get();
            break;
             //category search
            case 'category':
                $results = Category::where('title', 'like', '%' .  $search . '%')
                ->orderBy('title')
                ->get();
            break;
            default:
            //search articles by title and content match. Articles must be published!
            $results = Article::where('published', 1)
                    ->whereDate('published_at', '<=', now())
                    ->whereRaw('((title like \'%'.$search.'%\') OR (content like \'%'.$search.'%\'))')
                    ->orderBy('published_at')
                    ->get();
            $type = 'article';
            break;
        }
    }
        //return results to search view
        return view('/search', ['query' => $search,
            'results' => $results,
            'type' => $type
            ]);
    }

}
