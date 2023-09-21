<!-- Компонент детальной страницы -->
<div class="p-10 pt-4 px-5 h-full w-full bg-sky-50">
    <!-- Верхняя панель -->
    <div class="flex justify-between">
        <!-- Заголовок -->
        <h1 class="w-1/8 pb-2 text-gray-700 bg-sky-50 flex justify-start">
            <!-- Домашняя страница -->
            <a href="{{ route('dashboard') }}">
                <svg
                    class="mr-1 w-6 h-6 text-indigo-600 hover:text-indigo-800"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                </svg>
            </a>
            <span class="mx-1 text-slate-600 text-lg font-bold"> > </span>
            <span class="mr-1 text-lg font-medium">{{$title}}</span>

            <!-- Кнопка формы добавить товар -->

            
                <a href="{{ $formUrl }}">
                    <svg
                        class="w-8 h-8 text-sky-500 hover:text-sky-700"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
            
                
            
        </h1>

        <!-- Поиск -->
        <form action="{{ $indexUrl }}" method="get" class="w-1/2">
            <div class="relative rounded-md shadow-sm">
                <button
                    class="absolute left-0 w-9 h-8 rounded-l-md bg-indigo-700 hover:bg-indigo-900 inset-y-0 flex justify-center items-center"
                    type="submit"
                >
                    <svg
                        class="w-6 h-6 text-gray-100"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                        />
                    </svg>
                </button>
                <input
                    class="pl-10 h-8 w-full rounded-md text-slate-600 text-sm font-medium border-2 border-indigo-200 focus:border-indigo-800 hover:border-indigo-800"
                    value="{{ old('search') }}"
                    type="text"
                    id="search"
                    name="search"
                    placeholder="Что вы хотите найти?"
                />
            </div>
        </form>

        <button
            id="filterButtonUp"
            class="flex justify-center items-center mb-1 w-40 h-8 rounded-md bg-indigo-700 hover:bg-indigo-800 text-white text-md font-medium"
        >
            Фильтры
        </button>

        <!-- Фильтры -->
        <x-filters url="{{ $indexUrl }}">
            <x-dynamic-component :component="$componentName"/>
        </x-filters>
    </div>
    <!-- Верхняя панель конец -->

    <!-- Разделительная линия -->
    <div class="mb-6 h-[2px] bg-slate-400"></div>

    <!-- Main -->
    {{ $slot }}
</div>
