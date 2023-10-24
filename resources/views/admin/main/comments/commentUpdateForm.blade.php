@extends('admin.layouts.dashboard')
@section('commentUpdateForm')
    <div class="p-4 pb-12 flex flex-col justify-center">

        <!-- Заголовок формы -->
        <div class="max-w-md mx-auto">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-slate-600 mx-auto">
                <path
                    d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
            </svg>
            <h2 class="mt-1 text-2xl sm:text-xl font-bold text-slate-500">Редактировать отзыв</h1>
        </div>

        <!-- Цветная шапка формы -->
        <div class="mt-2 sm:mt-3 mx-auto max-w-md w-full h-10 bg-slate-600 rounded-t-xl"></div>
        <!-- Форма -->
        <div class="p-6 sm:p-10 sm:pt-0 mx-auto max-w-md w-full bg-white/80 backdrop-blur-xl rounded-xl shadow-xl">
            <form action="{{ route('comments.update', ['comment' => $comment]) }}" method="post" novalidate
                class="space-y-6">
                @csrf
                @method('PUT')
                <!-- Преимущества -->
                <div>
                    <div class="relative rounded-md shadow-sm mt-1">
                        <textarea autofocus value="{{ old('message') }}" type="text" id="message" name="message" required
                            class="pl-2 w-full h-[120px] rounded-md text-slate-600 text-sm {{ $errors->has('message') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500' }}"></textarea>
                        @error('message')
                            <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-red-500">
                                    <path fill-rule="evenodd"
                                        d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('message')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Кнопка отправки формы -->
                <div>
                    <button
                        class="w-full py-2 px-4 rounded-md bg-cyan-600 text-white font-semibold shadow-lg transition duration-150 ease-in-out hover:bg-cyan-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
