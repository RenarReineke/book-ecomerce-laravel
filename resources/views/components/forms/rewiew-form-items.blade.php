<!-- Оценка продукта -->
<div>
    <label for="rating" class="block text-sm font-medium text-gray-700"
        >Оценка</label
    >
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 {{ $errors->has('rating') ? 'text-red-400' : 'text-gray-400'}}"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <select
            id="rating"
            name="rating"
            class="pl-10 w-full rounded-md border-gray-300"
        >
            <option
                class="hover:font-bold"
                value="{{ old('rating') }}"
                disabled
                selected
            >
                -- Выберите оценку --
            </option>
            @foreach ($ratingList as $rating) @if ($loop->first) @continue
            @endif
            <option
                class="hover:font-bold capitalize"
                value="{{$rating->value}}"
            >
                {{$loop->index . ' ' .$rating->name}}
            </option>
            @endforeach
        </select>
    </div>
    @error('rating')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Преимущества -->
<div>
    <label for="profit" class="block text-sm font-medium text-gray-700"
        >Преимущества</label
    >
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 {{ $errors->has('profit') ? 'text-red-400' : 'text-gray-400'}}"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <input
            autofocus
            value="{{ old('profit') }}"
            type="text"
            id="profit"
            name="profit"
            required
            placeholder="Плотно лежит в руке"
            class="pl-10 w-full rounded-md text-sm {{ $errors->has('profit') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}"
        />
        @error('profit')
        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 text-red-500"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
        @enderror
    </div>
    @error('profit')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Недостатки -->
<div>
    <label for="unprofit" class="block text-sm font-medium text-gray-700"
        >Недостатки</label
    >
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 {{ $errors->has('unprofit') ? 'text-red-400' : 'text-gray-400'}}"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <input
            value="{{ old('unprofit') }}"
            type="text"
            id="unprofit"
            name="unprofit"
            required
            placeholder="Их нет"
            class="pl-10 w-full rounded-md text-sm {{ $errors->has('unprofit') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}"
        />
        @error('unprofit')
        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 text-red-500"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
        @enderror
    </div>
    @error('unprofit')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Дополнительный комментарий -->
<div>
    <label for="text" class="block text-sm font-medium text-gray-700"
        >Комментарий</label
    >
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 {{ $errors->has('text') ? 'text-red-400' : 'text-gray-400'}}"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <input
            value="{{ old('text') }}"
            type="text"
            id="text"
            name="text"
            required
            placeholder="Очень рад, что приобрел этот товар"
            class="pl-10 w-full rounded-md text-sm {{ $errors->has('text') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}"
        />
        @error('text')
        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 text-red-500"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
        @enderror
    </div>
    @error('text')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Продукт, на который пишется отзыв -->
<div>
    <label for="product_id" class="block text-sm font-medium text-gray-700"
        >№ продукта</label
    >
    <div class="relative rounded-md shadow-sm mt-1">
        <div
            class="absolute left-0 pl-3 inset-y-0 flex justify-center items-center"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 {{ $errors->has('product_id') ? 'text-red-400' : 'text-gray-400'}}"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"
                />
            </svg>
        </div>
        <input
            value="{{ old('product_id') }}"
            type="number"
            id="product_id"
            name="product_id"
            required
            placeholder="777"
            class="pl-10 w-full rounded-md text-sm {{ $errors->has('product_id') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}"
        />
        @error('product_id')
        <div class="pr-3 absolute inset-y-0 right-0 flex items-center">
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                class="w-5 h-5 text-red-500"
            >
                <path
                    fill-rule="evenodd"
                    d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
        @enderror
    </div>
    @error('product_id')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<!-- Фото продукта от юзера -->
<div>
    <label for="image" class="block text-sm font-medium text-gray-700"
        >Фото</label
    >
    <input
        value="{{ old('image') }}"
        type="file"
        multiple
        id="image"
        name="images[]"
        class="p-1 bg-slate-300 w-full rounded-md text-sm {{ $errors->has('image') ? 'placeholder-red-300 border-red-300 focus:border-red-500 focus:ring-red-500' : 'placeholder:text-gray-400 border-gray-300 focus:border-cyan-500 focus:ring-cyan-500'}}"
    />
    @error('image')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
