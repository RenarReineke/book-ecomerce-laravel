@extends('layouts.dashboard') 
@section('productList')
<div class="relative flex flex-row-reverse h-screen bg-sky-50">

    @include('.admin.filterBar')

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">

        <div class="flex justify-between">
            <!-- Заголовок -->
        <h1 class="mx-auto w-full pb-2 text-gray-700 bg-sky-50 flex justify-start">
            <span class="mr-1 text-lg font-medium">Товары</span>
            <a href="/admin/products/create">
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

        <button id="filterButtonUp" class="flex justify-center items-center mb-1 w-40 h-8 rounded-md bg-indigo-700 hover:bg-indigo-800 text-white text-md font-medium">Фильтры</button>
        </div>

        <!-- Таблица -->
        <div
            class="mx-auto w-full text-sm font-medium text-slate-800"
        >   
            <!-- Заголовок таблицы -->
            <div class="h-12 grid grid-cols-[30px_100px_200px_100px_100px_100px_200px_200px_200px_100px_100px] gap-x-3 bg-slate-200 rounded-t-md">    
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
                <div class="h-20 grid grid-cols-[30px_100px_200px_100px_100px_100px_200px_200px_200px_100px_100px] gap-x-3 mb-2 rounded-md bg-white text-slate-600 shadow-md">
                    <div class="p-2 w-5 flex justify-start items-center">
                        {{$product->id}}
                    </div>

                    <!-- Картинка -->
                    <div
                        class="p-2 w-full flex justify-start items-center"
                    >
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
                        {{$product->rating}}
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
                    <div class="pl-2 w-10 flex justify-start items-center space-x-2">
                        <!-- Удалить товар -->
                        <form
                            method="post"
                            action="products/{{$product->id}}/delete"
                        >
                            @csrf
                            <button type="submit" class="h-full w-full">
                                <svg
                                    class="w-6 h-6 text-red-600 hover:text-red-800"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </form>

                        <!-- Редактировать товар -->
                        <form method="post" action="products/{{$product->id}}/edit">
                            @csrf
                            <button type="submit" class="h-full w-full">
                                <svg
                                    class="w-6 h-6 text-cyan-600 hover:text-cyan-800"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"
                                        clip-rule="evenodd"
                                    />
                                    <path
                                        d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z"
                                    />
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </form>
                    </div>
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

    filterButtonUp.addEventListener('click', (e) => filterBar.style.display = `flex`);
    filterButton.addEventListener('click', (e) => filterBar.style.display = `none`);

    // Спарсить квери параметры урла
    params = new URLSearchParams(location.search);
    params.has('page') ? params.delete('page') : params;

    let links = document.querySelectorAll('#pagination a');
    console.log(params.keys());
    links.forEach((item) => item.setAttribute('href', item.attributes['href'].value + `&${params}`));
</script>
@endpush
@endsection