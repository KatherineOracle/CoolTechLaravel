<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of all articles (backend).
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::all()
        ->sortBy('title');

        return view('/dashboard/articles', [
            'articles' => $articles
        ]);

    }

    /**
     * Show the form for editing or creating a single article.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(Request $request)
    {
        //get all categories for the select box
        $categories = Category::all()
            ->sortBy('title');

        //get all categories for the select box
        $tags = Tag::all()
            ->sortBy('title');


        $article = [];
        if ($request->id != "new") {
            $article = Article::where('id', $request->id)
                ->orderBy('title')
                ->first();
        } else {
            $article = new Article;
        }
        return view('/dashboard/article', [
            'categories' => $categories,
            'tags' => $tags,
            'article' => $article
        ]);
    }

    /**
     * Store or update an article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $published = 1;

        //prepare the slug based on title
        if ($request->slug == '') {
            $request->slug =  Str::slug($request->title, '-');
        }

        //prepare the publihed date
        if ($request->published_at == '') {
            $request->published_at =  now();
        }

        //handle published checkbox value
        if ($request->published != "on") {
            $published = 0;
        } else {
            $published = 1;
        }

        //prepare article per model
        $article_data = [
            'slug' => $request->slug,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'published' => $published,
            'content' => $request->content,
            'published_at' => str_replace("T", " ", $request->published_at),
        ];

        //upload the feature image, if there is one
        $filename = '';
        if ($request->file('feature_image')) {
            $file = $request->file('feature_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            //merge feature image with article array
            $article_data = array_merge($article_data, ['feature_image' => $filename]);
        }

        //save, destroy or update
        switch (true) {
            case ($request->action === "delete"):
                return  $this->destroy($request->id);
                break;
            case ($request->id === 'new'):
                $article = New Article( $article_data);
                $article->save();
                break;
            default:

                $article =  Article::updateOrCreate(['id' => $request->id], $article_data);
        }

        //delete all associated tags
        TagLink::where('article_id', '=', $article->id)->delete();

        //create tag array from form data
        $newtags = [];
        foreach ($request->tags as $tag) {
            array_push($newtags, ['tag_id' => $tag, 'article_id' => $article->id]);
        }

        //recreate all tags from form data
        TagLink::insert($newtags);

        //return to form with articles id
        return redirect('/dashboard/article/' . $article->id);
    }

    /**
     * Display the specified article on the front end.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $article = Article::where('slug', $request->slug)
            ->where('published', 1)
            ->whereDate('published_at', '<=', now())
            ->first();

        if (!isset($article)) {
            return view('/error404', [
                'code' => '404: Page not found',
                'message' => 'We\'re sorry, but we can\'t show you this article right now!'
            ]);
        }

        return view('/article', [
            'article' => $article,
            'author' => $article->user
        ]);
    }


    /**
     * Remove the specified article from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id', $id)->delete();
        //delete  tags
        TagLink::where('article_id', '=', $id)->delete();

        return redirect('/dashboard/articles');
    }
}
