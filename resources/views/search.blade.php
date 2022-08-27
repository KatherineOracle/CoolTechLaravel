<?php
/*
    Displays search form with dropdown to search Articles, Categories or Tags
    Displays search results
*/
?>
<x-app-layout>
    <x-slot name="header">
        <h1>Search</h1>
    </x-slot>

    <div class="story-main">

        <form class="row d-flex justify-content-stretch m-2" role="search">
            <div class="col col-lg-6 form-group pe-2">
                <input class="form-control" type="search" name="s" value="{{ $query }}" placeholder="Search" aria-label="Search">
            </div>
            <div class="col col-lg-4 form-group pe-2">

                <select class="form-control form-select" name="type" id="querytype">
                    <option selected disabled value="null">Search in...</option>
                    <option @if($type==='article' ) selected @endif value="article">Articles</option>
                    <option @if($type==='category' ) selected @endif value="category">Categories</option>
                    <option @if($type==='tag' ) selected @endif value="tag">Tags</option>
                </select>
            </div>
            <div class="col col-lg-2 form-group ">
                <button class="btn btn-secondary" type="submit">Search</button>
            </div>
        </form>
        <hr />

        @if($query != "")
            <h2>Results for "{{$query}}"</h2>

        @if($results)
        <ul>
            @foreach($results as $result)
            <li>
                <h5><a href="/{{ $type }}/{{ $result->slug }}">{{ $result->title }}</a></h5>
                @if($result->content)
                <p><strong>{{ date('M d, Y ', strtotime( $result->published_at)) }}</strong>: {!! Str::words(strip_tags($result->content), $limit = 25, $end = '...') !!}</p>
                @endif
                <hr />
            </li>
            @endforeach
        </ul>
        @else

        <p>No results found, sorry</p>

        @endif

        @else
        <p>Please search for something above. I can help you find articles, tags and categories</p>
        @endif

    </div>

</x-app-layout>
