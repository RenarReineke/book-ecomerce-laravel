@extends('admin.layouts.dashboard') @section('cartList')
<x-page-list
    title="Корзины"
    formUrl="{{ route('carts.create') }}"
    indexUrl="{{ route('carts.index') }}"
    componentName="cart-filters"
>
    <!-- Таблица -->
    <div class="mx-auto w-1/2 text-sm font-medium text-slate-800">
        <!-- Заголовок таблицы -->
        <div
            class="h-12 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
        >
            <div class="p-2 w-5">ID корзины</div>
            <div class="p-2 w-20">Клиент</div>
            <div class="p-2 w-20">Дата добавления</div>
            <div class="p-2 w-10">Действия</div>
        </div>

        <!-- Тело таблицы -->
        @foreach ($carts as $cart)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 w-5 flex justify-start items-center">
                {{$cart->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$cart->user->name}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$cart->created_at}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('carts.show', ['cart' => $cart])}}"
                edit-link="{{route('carts.edit', ['cart' => $cart])}}"
                delete-link="{{route('carts.destroy', ['cart' => $cart])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$carts->links()}}
    </div>
</x-page-list>
@endsection
