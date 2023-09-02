@extends('layouts.dashboard') @section('cartDetail')
<h1
    class="mx-auto mt-5 w-96 text-lg text-gray-700 flex justify-center items-center"
>
    Корзина {{$cart->id}} клиента {{$cart->user->name}}
</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <div class="mx-auto w-full bg-white text-md">
        <!-- Заголовок -->
        <div
            class="h-10 flex justify-between items-stretch border-y border-slate-500 bg-slate-400 text-bold"
        >
            <div
                class="flex justify-center items-center border-l border-slate-500 flex-1"
            >
                ID товара
            </div>
            <div
                class="flex justify-center items-center border-l border-slate-500 flex-1"
            >
                Название
            </div>
            <div
                class="flex justify-center items-center border-l border-slate-500 flex-1"
            >
                Осталось
            </div>
            <div
                class="flex justify-center items-center border-l border-slate-500 flex-1"
            >
                Цена
            </div>
            <div
                class="flex justify-center items-center border-x border-slate-500 flex-1"
            >
                Количество в корзине
            </div>
        </div>

        <!-- Тело -->
        @foreach ($cart->products as $product)
        <!-- Форма удаления -->
        <div class="h-10 w-10 relative -left-8 top-2">
            <form method="post" action="products/{{$product->id}}>
                @csrf
                <button type="submit" class="bg-lime-600 h-10 w-10 hover:cursor-default">
                    <svg
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="w-6 h-6 text-red-600"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </form>
        </div>

        <!-- Строка -->
        <a href="products/{{$product->id}}" class="block hover:bg-red-100">
            <div
                class="relative h-10 hover:bg-slate-200 hover:cursor-pointer flex justify-between items-stretch border-b"
            >
                <div
                    class="flex justify-center items-center border-l border-slate-300 flex-1"
                >
                    {{$product->id}}
                </div>
                <div
                    class="flex justify-center items-center border-l border-slate-300 flex-1"
                >
                    {{$product->title}}
                </div>
                <div
                    class="flex justify-center items-center border-l border-slate-300 flex-1"
                >
                    {{$product->amount}}
                </div>
                <div
                    class="flex justify-center items-center border-l border-slate-300 flex-1"
                >
                    {{$product->price}}
                </div>
                <div
                    class="flex justify-center items-center border-x border-slate-300 flex-1"
                >
                    {{$product->pivot->amount}}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
