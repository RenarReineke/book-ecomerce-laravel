@extends('layouts.dashboard')
@section('rewiewList')               
<div class="relative flex flex-row-reverse h-full bg-sky-50 border-4 rounded-lg">
    <x-filters url="{{route('rewiews.index')}}">
        <x-rewiew-filters></x-rewiew-filters>
    </x-filters>

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
        <!-- Верхняя панель -->       
            <x-header title="Отзывы" formUrl="{{route('rewiews.create')}}" searchUrl="{{route('rewiews.index')}}"></x-header>
        <!-- Верхняя панель конец -->

        <!-- Разделительная линия -->
        <div class="mb-6 h-[2px] bg-slate-400"></div>

        <!-- Таблица -->
        <div class="mx-auto w-full text-sm font-medium text-slate-800">
            <!-- Заголовок таблицы -->
            <div
                class="h-12 grid grid-cols-[1fr_3fr_3fr_2fr_2fr_2fr_3fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
            >
                <div class="p-2">ID</div>
                <div class="p-2">Клиент</div>
                <div class="p-2">Продукт</div>
                <div class="p-2">Рейтинг</div>
                <div class="p-2">Комментарии</div>
                <div class="p-2">Лайки</div>
                <div class="p-2">Действия</div>
            </div>

            <!-- Тело таблицы -->
            @foreach ($rewiews as $rewiew)
            <!-- Строка таблицы -->
            <div
                class="h-20 grid grid-cols-[1fr_3fr_3fr_2fr_2fr_2fr_3fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
            >
                <div class="p-2 flex justify-start items-center">
                    {{$rewiew->id}}
                </div>

                <div class="p-2 flex justify-start items-center">
                    {{$rewiew->user->name}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$rewiew->product->title}}
                </div>
                <div class="p-2 w-28 flex justify-start items-center">
                    @for ($i = 1; $i <= 5; $i++)
                    <svg
                        class="w-8 h-8 stroke-none {{$i <= $rewiew->rating ? 'fill-pink-500' : 'fill-slate-500'}}"
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
                <div class="p-2 flex justify-start items-center">
                    {{$rewiew->comments->count()}}
                </div>
                <div class="p-2 flex justify-start items-center">
                    {{$rewiew->likes->count()}}
                </div>

                <!-- Действия -->
                <x-action-list 
                    detail-link="{{route('rewiews.show', ['rewiew' => $rewiew])}}"
                    edit-link="{{route('rewiews.edit', ['rewiew' => $rewiew])}}"
                    delete-link="{{route('rewiews.destroy', ['rewiew' => $rewiew])}}"
                    >
                </x-action-list>

            </div>
            @endforeach
        </div>
        <div id="pagination" class="mt-3">
            {{$rewiews->links()}}
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
@endpush
                    
@endsection
