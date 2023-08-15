<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-[url('../../public/storage/wave.svg')] bg-fixed bg-bottom bg-no-repeat">
    <div class="h-screen">
        <header class="mx-auto h-96 w-full bg-green-200 text-xl font-bold text-white">
            <nav class="flex h-full items-center justify-center space-x-16">
                <a href="{{ route('admin') }}"
                    class="flex h-40 w-40 items-center justify-center rounded-full border-4 border-black bg-red-500 hover:border-8">Админка</a>
                <a href="{{ route('register') }}"
                    class="flex h-40 w-40 items-center justify-center rounded-full border-4 border-black bg-blue-700 hover:border-8">Регистрация</a>
                <a href="{{ route('login') }}"
                    class="flex h-40 w-40 items-center justify-center rounded-full border-4 border-black bg-yellow-400 hover:border-8">Войти</a>
                <a href="/"
                    class="flex h-40 w-40 items-center justify-center rounded-full border-4 border-black bg-indigo-700 hover:border-8">Магазин</a>
            </nav>
        </header>
    </div>

</body>

</html>
