<?php
/*
    Display single article
*/
?>
<x-app-layout>

@if($article)
    <x-slot name="header">
    <figure><img class="img-fluid" src="/images/{{ $article->feature_image }}" /></figure>
    <h1>{{ $article->title }}</h1>
    </x-slot>

    <div class="story-main">

        <dl class="story-meta">
        <dt>Submitted by:</dt><dd>{{ $author->name }} on <time>{{ date('M d, Y \a\t h:m:s a', strtotime( $article->published_at)) }}</time></dd>
        <dt>Category:</dt><dd><a href="/category/{{ $article->category->slug  }}">{{ $article->category->title }}</a></dd>
        <dt>Tags: </dt><dd>
        @foreach($article->tags as $tag)
        <a href="/tag/{{ $tag->slug  }}"  class="badge badge-info">{{ $tag->title  }}</a>
        @endforeach
        </dd>
        </dl>

        </div>

        {!! $article->content !!}

        @endif
</x-app-layout>
