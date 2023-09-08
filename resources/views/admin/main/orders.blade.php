@extends('layouts.dashboard')
@section('orders')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">
    Заказы
    <a href="{{route('orders.create')}}" class="mx-auto w-12 block">
        <svg
            class="w-12 h-12 text-sky-700/30 hover:text-sky-700"
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
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID заказа</th>
                <th class="border border-slate-300">Клиент</th>
                <th class="border border-slate-300">Сумма</th>
                <th class="border border-slate-300">Дата формирования</th>
                <th class="border border-slate-300">Статус</th>
                <th class="border border-slate-300">Оплата</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="text-center border border-slate-300">
                    <a href="{{route('orders.show', ['order' => $order])}}" class="block hover:bg-slate-700 hover:text-white">
                        {{$order->id}}
                    </a>
                </td>
                <td class="p-2 text-center border border-slate-300">   
                    {{$order->user->name}} 
                </td>
                <td class="p-2 text-center border border-slate-300">{{$order->totalPrice()}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->created_at}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->status}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->payment ? 'Оплачен' : 'Нет'}}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$orders->links()}}
    </div>
</div>
@endsection
