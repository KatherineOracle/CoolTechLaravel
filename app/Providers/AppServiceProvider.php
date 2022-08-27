<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Category;
use App\Models\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringLength(191);

        View::composer('*', function($view)

        {

            //get full list of categories and tags for navigation
            $categories = Category::orderBy('title')->get();
            $tags = Tag::orderBy('title')->get();
            $view->with(['catnavbars' => $categories,
            'tagnavbars' => $tags] );

        });

    }
}
