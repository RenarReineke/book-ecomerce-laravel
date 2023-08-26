@extends('layouts.welcome')

@section('login')
<!-- Компонент регистрации -->
<div class="p-6 pb-12 flex flex-col justify-center">

    <!-- Заголовок формы -->
    <div class="max-w-md mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 text-red-600 mx-auto">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
        </svg>

        <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-red-900">Войти в аккаунт</h1>
    </div>

    <!-- Форма -->
    <div class="mt-6 sm:mt-10 p-6 sm:p-10 mx-auto max-w-md w-full bg-white/80 backdrop-blur-xl rounded-xl shadow-xl">
        <form action="/auth/login" method="post" autocomplete="off" novalidate class="space-y-6">

            @csrf

            <div>
                @error('error')
                    {{$message}}
                @enderror
            </div>

            <!-- Почта -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Почта</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('email') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>

                    </div>
                    <input value="{{old('email')}}" type="email" id="email" name="email" required placeholder="helsing@gmail.com" class="pl-10 w-full rounded-md text-sm {{ $errors->has('email') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-green-500 focus:ring-green-500'}}">
                    @error('email')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Пароль -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
                <div class="relative rounded-md shadow-sm mt-1">
                    <div class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 {{ $errors->has('password') ? 'text-red-400' : 'text-gray-400'}}">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <input value="{{old('password')}}" type="password" id="password" name="password" required placeholder="Минимум 8 символов" class="pl-10 w-full rounded-md text-sm {{ $errors->has('password') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-green-500 focus:ring-green-500'}}">
                    @error('password')
                        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    @enderror
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Ссылка на восстановление пароля и чекбокс Запомнить меня -->
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                    <label for="remember" class="text-sm text-gray-900">Запомнить меня</label>
                </div>

                <a href="{{route('forgot')}}" class="font-medium text-sm text-green-600 hover:text-green-500">Забыли пароль?</a>
            </div>

            <!-- Кнопка отправки формы -->
            <div>
                <button class="w-full py-2 px-4 rounded-md bg-green-500 text-white font-semibold shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Войти</button>
            </div>
        </form>
    </div>
</div>
@endsection