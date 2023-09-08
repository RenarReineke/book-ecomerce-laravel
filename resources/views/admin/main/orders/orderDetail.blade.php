@extends('layouts.dashboard')
@section('orderDetail')
<h1
    class="mt-5 w-full text-center text-lg text-gray-700 flex justify-center items-center"
>
    Заказ <span class="mx-1 font-bold">№ {{$order->id}}</span> клиента  <span class="ml-1 font-bold">{{$order->user->name}}</span>
</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <div class="mx-auto w-1/2 bg-white text-md">
        <!-- Заголовок -->
        <div
            class="h-10 flex justify-between items-stretch border-y border-slate-500 bg-indigo-600 text-bold text-white rounded-t-lg"
        >
            <div
                class="flex justify-center items-center border-slate-500 w-24"
            >
                Товар
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-500 w-24"
            >
                Цена
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-500 w-24"
            >
                Количество
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-500 w-24"
            >
                Стоимость
            </div>
        </div>

        <!-- Тело -->
        @foreach ($order->products as $product)
        <!-- Строка -->
        <div
            class="relative h-20 hover:bg-slate-200 flex justify-between items-stretch border-b"
        >
            <a
                href="products/{{$product->id}}"
                class="flex justify-center items-center border-l border-slate-300 w-24 hover:cursor-pointer hover:text-white hover:bg-slate-500 hover:underline"
            >
                {{$product->title}}
            </a>

            <div
                class="flex justify-center items-center border-l border-slate-300 w-24"
            >
                {{$product->price}} Р/шт
            </div>

            <div
                class="flex justify-center items-center border-l border-slate-300 w-24"
            >
                {{$product->pivot->amount}} Шт
            </div>

            <!-- Общая цена товара -->
            <div
                class="flex justify-center items-center border-x border-slate-300 w-24"
            >
                {{$product->price * $product->pivot->amount}} Р
            </div>
        </div>
        @endforeach

        <!-- Общая цена заказа -->
        <div
            class="flex justify-around items-center h-20 border-b border-x border-slate-300 bg-slate-100"
        >   
            <div>
                Статус: <span class="font-bold">{{$order->status}}</span>
            </div>
            <div>
                Оплата: <span class="font-bold">{{$order->payment ? 'Оплачен' : 'Нет'}}</span>
            </div>
            <div>
                Сумма: <span class="font-bold">{{$order->TotalPrice()}}</span>
            </div>  
        </div>
    </div>
</div>
@endsection
