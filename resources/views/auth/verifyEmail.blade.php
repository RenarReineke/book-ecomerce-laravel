@extends('layouts.welcome')

@section('verify')
<!-- Компонент регистрации -->
<div class="p-6 pb-12 flex flex-col justify-center">

<!-- Заголовок формы -->
<div class="max-w-md mx-auto">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 text-red-600 mx-auto">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
    </svg>

    <h2 class="mt-2 sm:mt-6 text-2xl sm:text-3xl font-bold text-red-900">Подтвердить почту?</h1>
</div>

<!-- Форма -->
<div class="mt-6 sm:mt-10 p-6 sm:p-10 mx-auto max-w-md w-full bg-white/80 backdrop-blur-xl rounded-xl shadow-xl">
    <form action="#" autocomplete="off" class="space-y-6">

        <!-- Кнопка отправки формы -->
        <div>
            <button class="w-full py-2 px-4 rounded-md bg-green-500 text-white font-semibold shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Подтвердить</button>
        </div>
    </form>
</div>
</div>
@endsection