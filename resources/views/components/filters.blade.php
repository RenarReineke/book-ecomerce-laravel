<!-- Панель фильтров -->
<div
    id="filterBar"
    class="hidden absolute z-10 bg-white w-1/4 h-screen flex-col justify-start items-start space-y-4 px-6 py-4 border-l-4 border-slate-300 text-slate-600 text-sm font-medium"
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
