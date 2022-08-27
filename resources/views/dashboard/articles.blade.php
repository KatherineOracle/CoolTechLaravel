<?php
/*
    display table view of existing articles
*/
?>

<x-app-layout>
    <x-slot name="header">
        <h1>
            {{ __('Edit your articles') }}
        </h1>
    </x-slot>
    <table class="table">
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th class="text-center">Published?</th>
            <th>Date</th>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td><a href="{{ url('/dashboard/article/').'/'.$article->id }}">{{$article->title}}</a></td>
                <td> {{ $article->user->name  }} </td>
                <td class="text-center"> {{ ( $article->published )? "Yes": "No" }} </td>
                <td> {{ date('M d, Y ', strtotime( $article->published_at)) }}</a></td>
            </tr>
            @endforeach
        <tbody>
    </table>

</x-app-layout>
