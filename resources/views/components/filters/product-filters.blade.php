<!-- Рейтинг -->
<div class="bg-sky-200 rounded-md">
    <fieldset class="flex">
        <legend class="text-center">Рейтинг</legend>
        @for ($i = 1; $i <= 5; $i += 1)
        <div class="px-2">
            <label for="{{ $i }}">{{ $i }}</label>
            <input type="radio" id="{{ $i }}" name="rating" value="{{ $i }}" />
        </div>
        @endfor
    </fieldset>
</div>

<!-- Цена -->
<div>
    <div class="flex justify-between space-x-2">
        <div>
            <label for="from">От</label>
            <input
                class="p-1 pr-0 h-6 w-16 rounded-md outline-none border-1 border-slate-300"
                type="number"
                id="from"
            />
        </div>

        <div>
            <label for="from">До</label>
            <input
                class="p-1 pr-0 h-6 w-16 rounded-md outline-none border-1 border-slate-300"
                type="number"
                id="to"
            />
        </div>
    </div>

    <!-- Диапазон цен -->
    <div class="flex mt-2">
        <input
            id="fromRange"
            name="fromPrice"
            value="{{ $minPriceProducts }}"
            min="{{ $minPriceProducts }}"
            max="{{ $avgPriceProducts - 1 }}"
            class="w-1/2 h-[10px] border-2 border-r-0 border-violet-500 rounded-l-md"
            type="range"
        />
        <input
            id="toRange"
            name="toPrice"
            value="{{ $maxPriceProducts }}"
            min="{{ $avgPriceProducts + 1 }}"
            max="{{ $maxPriceProducts }}"
            class="w-1/2 h-[10px] border-2 border-l-0 border-violet-500 rounded-r-md"
            type="range"
        />
    </div>
</div>

<!-- Категория -->
<div class="w-[300px] flex items-center">
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <select
            id="category"
            name="category"
            class="pl-10 w-full rounded-md border-gray-300 text-sm font-medium"
        >
            <option class="hover:font-bold" disabled selected>
                -- Категория --
            </option>
            @foreach ($categories as $category)
            <option
                class="hover:font-bold capitalize"
                value="{{$category->id}}"
            >
                {{$category->title}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<!-- Издательство -->
<div class="w-[300px] flex items-center">
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 text-gray-400"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <select
            id="publisher"
            name="publisher"
            class="pl-10 w-full rounded-md border-gray-300"
        >
            <option class="hover:font-bold" disabled selected>
                -- Издательство --
            </option>
            @foreach ($publishers as $publisher)
            <option
                class="hover:font-bold capitalize"
                value="{{$publisher->id}}"
            >
                {{$publisher->title}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<!-- Серия -->
<div class="w-[300px] flex items-center">
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 text-gray-400"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <select
            id="series"
            name="series"
            class="pl-10 w-full rounded-md border-gray-300"
        >
            <option class="hover:font-bold" disabled selected>
                -- Серия --
            </option>
            @foreach ($seriesList as $series)
            <option class="hover:font-bold capitalize" value="{{$series->id}}">
                {{$series->title}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<!-- Тип обложки -->
<div
    class="px-2 pr-0 flex items-center space-x-4 border-2 border-slate-400 rounded-md"
>
    <div>
        <label for="soft">Мягкая</label>
        <input type="checkbox" name="cover" value="мягкая" />
    </div>
    <div>
        <label for="hard">Твердая</label>
        <input type="checkbox" name="cover" value="твердая" />
    </div>
</div>
