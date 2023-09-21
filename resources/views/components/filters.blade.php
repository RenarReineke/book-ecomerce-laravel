<!-- Панель фильтров -->
<div id="filterLayout" class="hidden fixed z-40 top-0 right-0 bottom-0 left-0 bg-indigo-800/50"></div>
<div
    id="filterBar"
    class="hidden absolute top-0 right-0 z-50 bg-white w-1/4 h-[calc(100vh-54px)] rounded-r-xl flex-col justify-start items-start space-y-4 px-6 py-4 border-l-4 border-slate-300 text-slate-600 text-sm font-medium"
>
    <button
        id="filterButton"
        class="w-40 h-8 rounded-md bg-indigo-700 hover:bg-indigo-800 text-white text-md"
    >
        Фильтры
    </button>

    <!-- Форма с фильтрами -->
    <form
        action="{{ $url }}"
        method="get"
        class="h-5/6 flex flex-col items-start justify-between"
    >   
        <!-- Список фильтров -->
        {{$slot}}

        <button
            id="filterButton"
            class="w-40 h-8 rounded-md bg-indigo-700 hover:bg-indigo-800 text-white text-md"
        >
            Применить
        </button>
    </form>

    <form action="{{ $url }}" method="get">
        <button
                id="filterButton"
                class="w-40 h-8 rounded-md bg-pink-700 hover:bg-pink-800 text-white text-md"
            >
                Сбросить
        </button>
    </form>
    <!-- Фильтры конец -->
</div>
<!-- Панель фильтров конец -->
