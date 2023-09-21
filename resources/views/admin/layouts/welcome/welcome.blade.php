<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />

        @vite('resources/css/app.css')
    </head>

    <body
        class="min-h-screen fon bg-center bg-contain"
    >
        <div class="h-screen">

            @include('admin.layouts.welcome.header')

            <h1 class="text-center mt-10 text-2xl text-gray-700">Добро пожаловать!</h1>
        
            @yield('register')
            @yield('login')
            @yield('confirm')
            @yield('forgot')
            @yield('reset')
            @yield('verify')

        </div>
    </body>
    <style>
        .fon {
            background-image: url("{{asset('images/many.jpg')}}");
            background-repeat: no-repeat;
        }
    </style>
</html>
