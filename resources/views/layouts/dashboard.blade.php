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

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body
        class="h-screen"
    >
            
                @include('admin.sidebar')
                <div class="pl-[271px] relative">
                    @include('admin.header')
                    @yield('profile')
                    @yield('statistic')
                    @yield('clients')
                    @yield('employees')

                    @yield('orders')
                    @yield('orderDetail')
                    @yield('orderCreateForm')

                    @yield('carts')
                    @yield('cartDetail')

                    @yield('categories')

                    @yield('products')
                    @yield('productCreateForm')

                    @yield('authors')
                    @yield('publishers')
                    @yield('series')
                    @yield('images')

                    @yield('rewiews')
                    @yield('rewiewDetail')
                    @yield('rewiewCreateForm')
                    @yield('rewiewUpdateForm')

                    @yield('commentDetail')
                    @yield('commentCreateForm')
                    @yield('commentUpdateForm')

                    @yield('tags')
                </div>
            
        @stack('scripts')
    </body>
</html>
