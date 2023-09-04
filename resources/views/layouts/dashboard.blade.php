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
        class="h-screen bg-[url('../../public/storage/wave.svg')] bg-fixed bg-bottom bg-no-repeat"
    >
            <div class="flex flex-row h-full">
                @include('admin.sidebar')
                <div class="basis-11/12">
                    @include('admin.header')
                    @yield('profile')
                    @yield('statistic')
                    @yield('clients')
                    @yield('employees')
                    @yield('orders')
                    @yield('carts')
                    @yield('cartDetail')
                    @yield('categories')
                    @yield('products')
                    @yield('authors')
                    @yield('publishers')
                    @yield('series')
                    @yield('images')
                    @yield('rewiews')
                    @yield('tags')
                </div>
            </div>
        @stack('scripts')
    </body>
</html>
