<?php
/*
    Display footer bar and navigation
*/
?>

<x-cookie-consent-banner />

<footer class="bd-footer py-2 py-md-3 mt-0 bg-light">
    <div class="container-fluid py-2 py-md-2 px-4 px-md-3">
        <div class="row d-flex align-items-end d-flex justify-content-space-between">
            <div class="col col-xs-12 col-md-6 col-lg-6 mb-3">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="CoolTech">
                    <x-application-logo />
                </a>
                <!-- Navigation Links -->
                <nav class="row navbar-nav flex-row flex-wrap bd-navbar-nav">
                    <li class="col-lg-auto nav-item">
                        <a href="{{ route('legal',['terms-of-use']) }}" class="nav-link {{ request()->routeIs('legal',['terms-of-use'])? 'active':'' }}">
                            {{ __('Terms of use') }}
                        </a>
                    </li>
                    <li class="col-lg-auto nav-item">
                        <a href="{{ route('legal', ['privacy']) }}" class="nav-link {{ request()->routeIs('legal', ['privacy'])? 'active':'' }}">
                            {{ __('Privacy policy') }}
                        </a>
                    </li>
                    <li class="col-lg-auto nav-item">
                        <a href="{{ route('search') }}" class="nav-link {{ request()->routeIs('search')? 'active':'' }}">
                            {{ __('Search') }}
                        </a>
                    </li>
                    </ul>
                </nav>
            </div>
            <div class="col col-xs-12 col-md-6 col-lg-shrink mb-3">
                <p class="text-sm-center text-lg-end">{{ config('app.name') }} &copy; {{ date("Y") }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
