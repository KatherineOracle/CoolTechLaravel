<?php
/*
    Show list of articles assigned to single category
*/
?>
<x-app-layout>

    <x-slot name="header">
    @if($category)
        <h1>{{ $category->title }}</h1>
    @endif
    </x-slot>
    <div>
        <div class="row  normal-stories">
            @if($category)
                @forelse($articles as $article)
                <div class="col col-md-6 col-lg-4">
                    <figure><img class="img-fluid" src="/images/{{ $article->feature_image }}" /></figure>
                    <h5><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h5>
                    <p><strong>{{ date('M d, Y ', strtotime( $article->published_at)) }}</strong>: {!! Str::words(strip_tags($article->content), $limit = 25, $end = '...') !!}</p>
                </div>
                @empty
                <p class="lead">Sorry, there are no stories available in this category yet.</p>
                @endforelse
            @else
                <p>I'm sorry, category could not be found.</p>
            @endif
        </div>

</x-app-layout>
