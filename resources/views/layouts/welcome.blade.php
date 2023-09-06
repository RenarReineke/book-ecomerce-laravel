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
        class="min-h-screen bg-[url('../../public/storage/wave.svg')] bg-fixed bg-bottom bg-no-repeat"
    >
        <div class="h-screen">

            @include('admin.header')

            <h1 class="text-center mt-10 text-2xl text-gray-700">Добро пожаловать!</h1>
            <img class="w-1/2 h-auto mx-auto rounded-xl mt-5" src="{{ Vite::asset('resources/images/many.jpg') }}">
        
            @yield('register')
            @yield('login')
            @yield('confirm')
            @yield('forgot')
            @yield('reset')
            @yield('verify')

        </div>
    </body>
</html>
