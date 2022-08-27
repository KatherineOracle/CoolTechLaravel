<?php
/*
    Display header nav bar, and logged in status
*/
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <x-application-logo class="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a href="{{route('home')}}" class="{{ request()->routeIs('home')?'nav-link active':'nav-link' }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('about')}}" class="{{ request()->routeIs('about')?'nav-link active':'nav-link' }}">
                            {{ __('About us') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('search')}}" class="{{ request()->routeIs('search')?'nav-link active':'nav-link' }}">
                            {{ __('Search') }}
                        </a>
                    </li>
                </ul>

                @if(auth()->user())
                <ul class="navbar-nav d-flex align-items-center">

                    <li class="nav-item me-2">
                        <span class="text-success"><em>Greetings {{ auth()->user()->name }}</em></span>
                    </li>
                    <li class="nav-item me-2">

                        <a class="btn btn-primary btn-sm" href="/dashboard"> {{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm"> {{ __('Log Out') }}</button>
                        </form>
                    </li>

                </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
