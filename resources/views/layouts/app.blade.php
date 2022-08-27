<?php
/*
    Main app template wrapper
*/
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cool Tech') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/customisations.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    @include('layouts.navigation')

    <div class="container-fluid">
        <div class="row d-flex">


            <div class="bg-dark col  col-xs-12 col-sm-3 col-md-4 col-lg-2">
                <nav class="navbar category-navbar ">
                    @include('layouts.side-navigation')
                </nav>
            </div>

            <div class="col col-xs-12 col-sm-9 col-md-8 col-lg-10">
                <!-- Page Content -->
                <main class="container pt-2 ps-4 pb-4 ms-0">

                    <!-- Page Heading -->
                    <header class="">
                        {{ $header }}
                    </header>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />



                    @if(isset($errors))
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @endif
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    <footer>
        @include('layouts.footer')

    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
