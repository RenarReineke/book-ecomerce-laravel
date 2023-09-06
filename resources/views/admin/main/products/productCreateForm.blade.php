@extends('layouts.dashboard')
@section('productCreateForm')
<div class="p-4 pb-12 flex flex-col justify-center">

<!-- Заголовок формы -->
<div class="max-w-md mx-auto">
    <svg viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-600 mx-auto">
        <path d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
    </svg>
    <h2 class="mt-1 text-2xl sm:text-xl font-bold text-slate-500">Добавить товар</h1>
</div>

<!-- Цветная шапка формы -->
<div class="mt-2 sm:mt-3 mx-auto max-w-md w-full h-10 bg-slate-600 rounded-t-xl"></div>
<!-- Форма -->
<div class="p-6 sm:p-10 sm:pt-0 mx-auto max-w-md w-full bg-white/80 backdrop-blur-xl rounded-xl shadow-xl">
    <form action="{{route('products.store')}}" method="post" novalidate class="space-y-6">
        @csrf
        <!-- Название продукта -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Название</label>
            <div class="relative rounded-md shadow-sm mt-1">
                <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('title') ? 'text-red-400' : 'text-gray-400'}}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <input autofocus value="{{old('title')}}" type="text" id="title" name="title" required placeholder="Некрономикон" class="pl-10 w-full rounded-md text-sm {{ $errors->has('title') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                @error('title')
                    <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                        <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                        </svg>
                    </div>
                @enderror
            </div>
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Описание продукта -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
            <div class="relative rounded-md shadow-sm mt-1">
                <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('description') ? 'text-red-400' : 'text-gray-400'}}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <input autofocus value="{{old('description')}}" type="text" id="description" name="description" required placeholder="Древний фолиант" class="pl-10 w-full rounded-md text-sm {{ $errors->has('description') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                @error('description')
                    <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                        <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                        </svg>
                    </div>
                @enderror
            </div>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Группа инпутов 1 -->
        <div class="flex justify-between space-x-3">
            <!-- Цена продукта -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Цена</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('price') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input autofocus value="{{old('price')}}" type="number" id="price" name="price" required placeholder="100500" class="pl-10 w-full rounded-md text-sm {{ $errors->has('price') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                    @error('price')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('price')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Количество продукта -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Экземпляров</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('amount') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input autofocus value="{{old('amount')}}" type="number" id="amount" name="amount" required placeholder="10" class="pl-10 w-full rounded-md text-sm {{ $errors->has('amount') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                    @error('amount')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('amount')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Количество страниц -->
            <div>
                <label for="pages" class="block text-sm font-medium text-gray-700">Страниц</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('pages') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input autofocus value="{{old('pages')}}" type="number" id="pages" name="pages" required placeholder="777" class="pl-10 w-full rounded-md text-sm {{ $errors->has('pages') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                    @error('pages')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('pages')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Группа инпутов 2 -->
        <div class="flex justify-between space-x-3">
            <!-- Размер продукта -->
            <div>
                <label for="size" class="block text-sm font-medium text-gray-700">Размер</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('size') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input autofocus value="{{old('size')}}" type="text" id="size" name="size" required placeholder="75х30" class="pl-10 w-full rounded-md text-sm {{ $errors->has('size') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                    @error('size')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('size')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Тип обложки -->
            <div>
                <label for="cover-type" class="block text-sm font-medium text-gray-700">Тип обложки</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('cover-type') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <input autofocus value="{{old('cover-type')}}" type="text" id="cover-type" name="cover-type" required placeholder="Твердая" class="pl-10 w-full rounded-md text-sm {{ $errors->has('cover-type') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                    @error('cover-type')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('cover-type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Группа инпутов 3 -->
        <div class="flex justify-between space-x-3">
                <!-- Вес продукта -->
                <div>
                    <label for="weight" class="block text-sm font-medium text-gray-700">Вес</label>
                    <div class="relative rounded-md shadow-sm mt-1">
                        <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('weight') ? 'text-red-400' : 'text-gray-400'}}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input autofocus value="{{old('weight')}}" type="number" id="weight" name="weight" required placeholder="100500" class="pl-10 w-full rounded-md text-sm {{ $errors->has('weight') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                        @error('weight')
                            <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('weight')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Год выпуска -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Год выпуска</label>
                    <div class="relative rounded-md shadow-sm mt-1">
                        <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('year') ? 'text-red-400' : 'text-gray-400'}}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input autofocus value="{{old('year')}}" type="number" id="year" name="year" required placeholder="1971" class="pl-10 w-full rounded-md text-sm {{ $errors->has('year') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                        @error('year')
                            <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Рейтинг -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700">Рейтинг</label>
                    <div class="relative rounded-md shadow-sm mt-1">
                        <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('rating') ? 'text-red-400' : 'text-gray-400'}}">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input autofocus value="{{old('rating')}}" type="number" id="rating" name="rating" required placeholder="10" class="pl-10 w-full rounded-md text-sm {{ $errors->has('rating') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
                        @error('rating')
                            <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('rating')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
        </div>

        <!-- Категория продукта -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Категория</label>
            <div class="relative rounded-md shadow-sm mt-1">
                <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('category') ? 'text-red-400' : 'text-gray-400'}}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <select id="category" name="category" class="pl-10 w-full rounded-md border-gray-300">
                    <option class="hover:font-bold" value="{{old('category')}}" disabled selected>-- Выберите категорию --</option>
                    @foreach ($categories as $category)   
                        <option class="hover:font-bold capitalize" value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select> 
            </div>
            @error('category')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Издательство -->
        <div>
            <label for="publisher" class="block text-sm font-medium text-gray-700">Издательство</label>
            <div class="relative rounded-md shadow-sm mt-1">
                <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('publisher') ? 'text-red-400' : 'text-gray-400'}}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <select id="publisher" name="publisher" class="pl-10 w-full rounded-md border-gray-300">
                    <option class="hover:font-bold" value="{{old('publisher')}}" disabled selected>-- Выберите издательство --</option>
                    @foreach ($publishers as $publisher)   
                        <option class="hover:font-bold capitalize" value="{{$publisher->id}}">{{$publisher->title}}</option>
                    @endforeach
                </select> 
            </div>
            @error('publisher')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Серия продукта -->
        <div>
            <label for="series" class="block text-sm font-medium text-gray-700">Серия</label>
            <div class="relative rounded-md shadow-sm mt-1">
                <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('series') ? 'text-red-400' : 'text-gray-400'}}">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <select id="series" name="series" class="pl-10 w-full rounded-md border-gray-300">
                    <option class="hover:font-bold" value="{{old('series')}}" disabled selected>-- Выберите серию --</option>
                    @foreach ($seriesList as $series)   
                        <option class="hover:font-bold capitalize" value="{{$series->id}}">{{$series->title}}</option>
                    @endforeach
                </select>  
            </div>
            @error('series')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Группа инпутов 4 -->
        <div class="flex justify-between space-x-3">
            <!-- Теги -->
            <div class="flex-1">
                <label for="tags" class="block text-sm font-medium text-gray-700">Теги</label>
                <select multiple size="3" id="tags" name="tags[]" class="p-2 w-full h-20 rounded-md border-2 divide-y-2 divide-slate-200">
                    @foreach ($tags as $tag)   
                        <option class="hover:font-bold capitalize" value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>      
                @error('tags')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Авторы -->
            <div class="flex-1">
                <label for="authors" class="block text-sm font-medium text-gray-700">Авторы</label>
                <select required multiple size="3" id="authors" name="authors[]" class="p-2 w-full h-20 rounded-md border-2 divide-y-2 divide-slate-200">
                    @foreach ($authors as $author)   
                        <option class="hover:font-bold capitalize" value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select> 
                @error('authors')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Изображение продукта -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Изображение</label>     
            <input value="{{old('image')}}" type="file" multiple id="image" name="image" class="p-1 bg-slate-300 w-full rounded-md text-sm {{ $errors->has('image') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}">
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <!-- Кнопка отправки формы -->
        <div>
            <button class="w-full py-2 px-4 rounded-md bg-cyan-600 text-white font-semibold shadow-lg transition duration-150 ease-in-out hover:bg-cyan-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Добавить</button>
        </div>
    </form>
</div>
</div>
@endsection