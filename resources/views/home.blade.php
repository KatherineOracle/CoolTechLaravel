<?php
/*
    Show home page with 7 latest articles. The first of which is display as a fullwidth feature
*/
?>
<x-app-layout>
    <x-slot name="header">
        <h1 class="d-none">Home</h1>
    </x-slot>

    <div>

        @if($articles)

        @foreach($articles as $ind=>$article)
        @if($ind === 0)
        <div class="row feature-story mb-2">

            <div class="col ">
                <figure><img class="img-fluid" src="images/{{ $article->feature_image }}" /></figure>
                <div>
                    @if($ind === 0)
                    <h2><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h2>
                    @else
                    <h5><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h5>
                    @endif
                    <p><strong>{{ date('M d, Y ', strtotime( $article->published_at)) }}</strong>: {!! Str::words(strip_tags($article->content), $limit = 25, $end = '...') !!}</p>
                </div>
            </div>
        </div>
        @continue
        @endif

        @if($ind === 1)

        <div class="row normal-stories">
            @endif

            <div class="col col-sm-6 col-md-6  col-lg-6 col-xl-4 ">
                <figure><img class="img-fluid" src="images/{{ $article->feature_image }}" /></figure>
                <div>
                    @if($ind === 0)
                    <h2><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h2>
                    @else
                    <h5><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h5>
                    @endif
                    <p><strong>{{ date('M d, Y ', strtotime( $article->published_at)) }}</strong>: {!! Str::words(strip_tags($article->content), $limit = 25, $end = '...') !!}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

</x-app-layout>
