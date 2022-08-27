<?php
/*
    Display side bar nav
    shows category and tag links on front end
    shows links to available admin tools in the dashboard, depending on role
*/
?>

@if( Request::segment(1) !== "dashboard")

<h5 class=" ps-3 pt-3 pe-3">BY CATEGORY:</h5>
<ul class="nav navbar-nav">
    @foreach ($catnavbars as $navbarItem)
    <li class="nav-item">
        <a href="/category/{{ $navbarItem->slug }}" class="nav-link @if(request()->is('category/'.$navbarItem->slug)) active @endif ">
            {{ $navbarItem->title }}
        </a>

    </li>
    @endforeach

    <h5 class="ps-3 pt-3 pe-3">BY TAG:</h5>
    <ul class="nav navbar-nav">
        @foreach ($tagnavbars as $navbarItem)
        <li class="nav-item">
            <a href="/tag/{{ $navbarItem->slug }}" class="nav-link @if(request()->is('tag/'.$navbarItem->slug)) active @endif ">
                {{ $navbarItem->title }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif

    @if( auth()->user() && Request::segment(1) == "dashboard")
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>

        @if( auth()->user()->role->permission_level == 1)

        <li class="nav-item">
            <a class="nav-link" href="/dashboard/article/new"> Create article</a>
        </li>
        @endif

        @if( auth()->user()->role->permission_level == 2)
        <li class="nav-item">
            <a class="nav-link" href="/dashboard/articles">Articles</a>
            <ul class="nav flex-column ms-2">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/article/new"> Create article</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/dashboard/users">Users</a>
            <ul class="nav flex-column ms-2">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/user/new"> Create new user</a>
                </li>
            </ul>
        </li>
        </li>
        @endif
    </ul>
    @endif
