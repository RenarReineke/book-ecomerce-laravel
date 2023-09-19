@extends('layouts.dashboard') @section('productList')
<div class="h-full w-full relative flex flex-row-reverse">
    <x-filters url="{{route('products.index')}}">
        <x-product-filters></x-product-filters>
    </x-filters>

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
        <!-- Верхняя панель -->       
            <x-header title="Товары" formUrl="{{route('products.create')}}" searchUrl="{{route('products.index')}}"></x-header>
        <!-- Верхняя панель конец -->

        <!-- Разделительная линия -->
        <div class="mb-6 h-[2px] bg-slate-400"></div>

        <!-- Таблица -->
        <div class="mx-auto w-full text-sm font-medium text-slate-800">
            <!-- Заголовок таблицы -->
            <div
                class="h-12 grid grid-cols-[30px_100px_190px_80px_120px_100px_200px_180px_180px_100px_130px] gap-x-3 bg-slate-200 rounded-t-md"
            >
                <div class="p-2 w-5">ID</div>
                <div class="p-2 w-20">Thumb</div>
                <div class="p-2 w-20">Название</div>
                <div class="p-2 w-10">Цена</div>
                <div class="p-2 w-5">Рейтинг</div>
                <div class="p-2 w-10">Обложка</div>
                <div class="p-2 w-10">Категория</div>
                <div class="p-2 w-20">Издатель</div>
                <div class="p-2 w-20">Серия</div>
                <div class="p-2 w-10">Год</div>
                <div class="p-2 w-10">Действия</div>
            </div>

            <!-- Тело таблицы -->
            @foreach ($products as $product)
            <!-- Строка таблицы -->
            <div
                class="h-20 grid grid-cols-[30px_100px_190px_80px_120px_100px_200px_180px_180px_100px_130px] gap-x-3 mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
            >
                <div class="p-2 w-5 flex justify-start items-center">
                    {{$product->id}}
                </div>

                <!-- Картинка -->
                <div class="p-2 w-full flex justify-start items-center">
                    <img
                        class="object-cover w-full h-full rounded-full shadow-sm"
                        src="{{ Vite::asset('resources/images/book.jpg') }}"
                    />
                    <!-- @foreach ($product->images as $image)
                            <img
                                class="object-cover w-10 h-6"
                                src="{{ asset('storage/' . $image->url) }}"
                            />
                        @endforeach -->
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$product->title}}
                </div>
                <div class="p-2 w-10 flex justify-start items-center">
                    {{$product->price}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    @for ($i = 1; $i <= 5; $i++)
                    <svg
                        class="w-8 h-8 stroke-none {{$i <= $product->rating ? 'fill-pink-500' : 'fill-slate-500'}}"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"
                        />
                    </svg>
                    @endfor
                </div>
                <div class="p-2 w-10 flex justify-start items-center">
                    {{$product->cover_type}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$product->category?->title ?? 'Нет'}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$product->series?->publisher->title ?? 'Нет'}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$product->series?->title ?? 'Нет'}}
                </div>
                <div class="p-2 w-10 flex justify-start items-center">
                    {{$product->year}}
                </div>

                <!-- Действия -->
                <x-action-list 
                    detail-link="{{route('products.show', ['product' => $product])}}"
                    edit-link="{{route('products.edit', ['product' => $product])}}"
                    delete-link="{{route('products.destroy', ['product' => $product])}}"
                    >
                </x-action-list>

            </div>
            @endforeach
        </div>
        <div id="pagination" class="mt-3">
            {{$products->links()}}
        </div>
    </div>
</div>
@push('scripts')
<script>
    let filterButtonUp = document.getElementById("filterButtonUp");
    let filterButton = document.getElementById("filterButton");
    let filterBar = document.getElementById("filterBar");

    filterButtonUp.addEventListener(
        "click",
        (e) => (filterBar.style.display = `flex`)
    );
    filterButton.addEventListener(
        "click",
        (e) => (filterBar.style.display = `none`)
    );

    // Спарсить квери параметры урла
    // params = new URLSearchParams(location.search);
    // params.has("page") ? params.delete("page") : params;

    // let links = document.querySelectorAll("#pagination a");
    // console.log(params.keys());
    // links.forEach((item) =>
    //     item.setAttribute("href", item.attributes["href"].value + `&${params}`)
    // );

    let priceToInput = document.getElementById("to");
    let priceFromInput = document.getElementById("from");
    let priceToRangeInput = document.getElementById("toRange");
    let priceFromRangeInput = document.getElementById("fromRange");

    priceFromRangeInput.addEventListener('input', (e) => priceFromInput.value = e.target.value);
    priceToRangeInput.addEventListener('input', (e) => priceToInput.value = e.target.value);
</script>
@endpush @endsection
