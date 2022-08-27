<?php
/*
    Logged in user home page
*/
?>
<x-app-layout>
    <x-slot name="header">
        <h1>
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="story-main">
        <p>Hello {{ auth()->user()->name }}</p>
        <p>You're logged in!</p>

    </div>
</x-app-layout>
