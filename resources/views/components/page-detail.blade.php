<!-- Компонент детальной страницы -->
<div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
    <!-- Верхняя панель -->
    <div class="flex justify-between">
        <!-- Заголовок -->
        <h1
            class="w-1/8 pb-2 text-gray-700 bg-sky-50 flex justify-start items-center"
        >
            <!-- Ссылка на домашняя страницу -->
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

            <span>
                <svg
                    class="mx-1 w-3 h-3 text-slate-600 stroke-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 4.5l7.5 7.5-7.5 7.5"
                    />
                </svg>
            </span>

            <!-- Ссылка на страницу списка -->
            <a href="{{ $listLink }}" class="flex items-center">
                <svg
                    class="mr-1 w-5 h-5 text-indigo-600 hover:text-indigo-800"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5"
                    />
                </svg>
                <span class="mr-1 text-lg font-medium capitalize hover:text-indigo-800">{{ $listTitle }}</span>
            </a>

            <span class="mx-1 text-slate-600 text-lg font-bold"> > </span>

            <!-- Название текущей страницы -->
            <span class="mr-1 text-lg font-medium capitalize">{{ $title }}</span>

            <!-- Действия -->
            <x-action-list
                editLink="{{ $editLink }}"
                deleteLink="{{ $deleteLink }}"
            ></x-action-list>
        </h1>
        <!-- Заголовок конец -->

        <!-- Кнопка показа панели фильтров -->
        <button
            id="filterButtonUp"
            class="flex justify-center items-center mb-1 w-40 h-8 rounded-md bg-indigo-700 hover:bg-indigo-800 text-white text-md font-medium"
        >
            Фильтры
        </button>
    </div>
    <!-- Верхняя панель конец -->

    <!-- Разделительная линия -->
    <div class="mb-6 h-[2px] bg-slate-400"></div>

    <!-- Main -->
    {{ $slot }}
</div>
