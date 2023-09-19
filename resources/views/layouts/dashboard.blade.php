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

        <script src="//unpkg.com/alpinejs" defer></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body
        class="h-screen p-5 pl-0 bg-blue-950 overflow-hidden"
    >
            
                @include('admin.sidebar')
                <div class="ml-[271px] relative h-full bg-sky-50 border-4 rounded-lg">

                    @yield('profile')
                    @yield('statistic')

                    @yield('clientList')
                    @yield('clientDetail')
                    @yield('clientCreateForm')

                    @yield('employeeList')
                    @yield('employeeDetail')
                    @yield('employeeCreateForm')

                    @yield('orderList')
                    @yield('orderDetail')
                    @yield('orderCreateForm')

                    @yield('cartList')
                    @yield('cartDetail')

                    @yield('categoryList')
                    @yield('categoryDetail')
                    @yield('categoryCreateForm')
                    @yield('categoryUpdateForm')

                    @yield('productList')
                    @yield('productDetail')
                    @yield('productCreateForm')

                    @yield('tagList')
                    @yield('tagDetail')
                    @yield('tagCreateForm')
                    @yield('tagUpdateForm')

                    @yield('authorList')
                    @yield('authorDetail')
                    @yield('authorCreateForm')
                    @yield('authorUpdateForm')

                    @yield('publisherList')
                    @yield('publisherDetail')
                    @yield('publisherCreateForm')
                    @yield('publisherUpdateForm')

                    @yield('seriesList')
                    @yield('seriesDetail')
                    @yield('seriesCreateForm')
                    @yield('seriesUpdateForm')
                    
                    @yield('rewiewList')
                    @yield('rewiewDetail')
                    @yield('rewiewCreateForm')
                    @yield('rewiewUpdateForm')
                    
                    @yield('commentDetail')
                    @yield('commentCreateForm')
                    @yield('commentUpdateForm')
                    
                    @yield('images')
                </div>
            
        @stack('scripts')
    </body>
</html>
