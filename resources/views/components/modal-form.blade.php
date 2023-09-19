<!-- Компонент формы -->
<div>
    <!-- Защитный слой -->
    <div class="fixed z-40 left-0 top-0 right-0 bottom-0 bg-indigo-800/70"></div>
    <!-- Позиционирование формы -->
    <div class="fixed z-50 left-[calc(50%-280px)] top-8 w-auto h-[calc(100vh-150px)]">

        <!-- Цветная шапка формы -->
        <div class="mx-auto pt-1 max-w-md w-full h-10 bg-slate-600 rounded-t-xl">
            <!-- Заголовок формы -->
            <h2 class="text-center text-lg font-bold text-slate-100">{{$title}}</h1>
        </div>

        <!-- Форма -->
        <div class="p-6 mx-auto max-w-md w-full h-full overflow-auto bg-white/80 backdrop-blur-xl rounded-b-xl shadow-xl">
            <!-- Логотип формы -->
            <svg class="w-10 h-10 text-slate-600 mx-auto" viewBox="0 0 24 24" fill="currentColor">
                <path d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
            </svg>

            <form class="space-y-2" action="{{$url}}" method="post" novalidate class="space-y-6" enctype="multipart/form-data">
                @csrf
                {{$slot}}

                <!-- Кнопка отправки формы -->
                <div>
                    <button
                        class="w-full py-2 px-4 rounded-md bg-indigo-700 text-white font-semibold shadow-lg transition duration-150 ease-in-out hover:bg-indigo-600 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2"
                    >
                        Добавить
                    </button>
                </div>
            </form>
        </div>
        <!-- Форма конец -->

    </div>
</div>
<!-- Компонент формы конец -->
