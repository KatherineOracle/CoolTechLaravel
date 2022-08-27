
<?php
/*
    Show list of articles assigned to single tag
*/
?>
<x-app-layout>

    <x-slot name="header">
    @if($tag)
    <h1>{{ $tag->title }}</h1>
    @endif
    </x-slot>

    <div>


    <div class="row  normal-stories">
    @if($tag)
            @forelse ($articles as $article)
            <div class="col col-md-6 col-lg-4">
                <figure><img class="img-fluid" src="/images/{{ $article->feature_image }}" /></figure>
                <h5><a href="{{ url('/article').'/'.$article->slug }}">{{$article->title}}</a></h5>
                <p><strong>{{ date('M d, Y ', strtotime( $article->published_at)) }}</strong>: {!! Str::words(strip_tags($article->content), $limit = 25, $end = '...') !!}</p>
            </div>
            @empty
            <p class="lead">Sorry, there are no stories with this tag yet.</p>
            @endforelse
    @else
        <p>I'm sorry, the tag could not be found.</p>
    @endif
        </div>


    </div>

</x-app-layout>
