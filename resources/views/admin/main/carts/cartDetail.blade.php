@extends('layouts.dashboard') @section('cartDetail')
<h1
    class="mx-auto mt-5 w-96 text-lg text-gray-700 flex justify-center items-center"
>
    Корзина {{$cart->id}} клиента {{$cart->user->name}}
</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <div class="mx-auto w-1/2 bg-white text-md">
        <!-- Заголовок -->
        <div
            class="h-10 flex justify-between items-stretch border-y border-slate-500 bg-indigo-600 text-bold text-white rounded-t-lg"
        >
            <div class="flex justify-center items-center border-slate-500 w-10">
                Del
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-500 flex-1"
            >
                Товар
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
                class="flex justify-center items-center border-l border-slate-500 w-28"
            >
                Количество
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-500 w-28"
            >
                Стоимость
            </div>
        </div>

        <!-- Тело -->
        @foreach ($cart->products as $product)
        <!-- Строка -->
        <div
            class="relative h-20 hover:bg-slate-200 flex justify-between items-stretch border-b"
        >
            <div
                class="flex justify-center items-center border-l border-slate-300 w-10"
            >
                <!-- Форма удаления -->
                <x-delete-button
                    url="{{$cart->id}}/remove"
                    product="{{$product->id}}"
                />
            </div>

            <a
                href="products/{{$product->id}}"
                class="flex justify-center items-center border-l border-slate-300 flex-1 hover:cursor-pointer hover:text-white hover:bg-slate-500 hover:underline"
            >
                {{$product->title}}
            </a>

            <div
                class="flex justify-center items-center border-l border-slate-300 flex-1"
            >
                {{$product->amount}}
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-300 flex-1"
            >
                {{$product->price}} Р/шт
            </div>

            <!-- Форма для изменения количества товара в корзине -->
            <div
                class="flex justify-center items-center border-l border-slate-300 w-28"
            >
                <form
                    class="mt-2 flex flex-col justify-center items-center"
                    method="post"
                    action="{{ route('increaseItemCart', ['cart' => $cart->id]) }}"
                >
                    @csrf @method('PUT')
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <input
                        class="w-2/3 h-2/3 border rounded-lg pl-6 border-slate-500 text-center hover:bg-slate-700 hover:text-white"
                        type="number"
                        name="amount"
                        value="{{$product->pivot->amount}}"
                        id="amount"
                    />
                    <button
                        class="text-xs bg-indigo-500 rounded-lg hover:text-white hover:bg-indigo-600 mt-1 p-1"
                        type="submit"
                    >
                        Изменить
                    </button>
                </form>
            </div>

            <div
                class="flex justify-center items-center border-x border-slate-300 flex-1"
            >
                {{$product->price * $product->pivot->amount}} Р
            </div>
        </div>
        @endforeach

        <!-- Общая цена -->
        <div
            class="flex justify-around items-center h-20 border-b border-x border-slate-300"
        >
            <button
                class="bg-indigo-700 text-white rounded-2xl p-2 text-sm hover:bg-indigo-900"
            >
                Оформить заказ
            </button>
            <a
                href="/admin/products"
                class="border border-slate-300 rounded-2xl p-2 text-sm hover:bg-slate-500 hover:text-white hover:cursor-pointer"
                >Продолжить покупки</a
            >
            <div class="text-indigo-700">Скидка <span>500 P</span></div>
            <div class="">
                Сумма: <span class="font-bold">{{$cart->TotalPrice()}}</span>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let amountInput = document.getElementById("amount");
    amountInput.onclick = function (event) {
        event.stopPropagation();
    };
    amountInput.onchange = function (event) {
        event.stopPropagation();
    };
</script>
@endpush @endsection
