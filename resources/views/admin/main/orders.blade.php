@extends('layouts.dashboard')
@section('orders')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">Заказы</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID заказа</th>
                <th class="border border-slate-300">Клиент</th>
                <th class="border border-slate-300">Количество товаров</th>
                <th class="border border-slate-300">Дата формирования</th>
                <th class="border border-slate-300">Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">{{$order->id}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->user->name}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->products_count ?? 0}}</td>
                <td class="p-2 text-center border border-slate-300">{{$order->created_at}}</td>
                <td class="p-2 text-center border border-slate-300">Оплачен</td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$orders->links()}}
    </div>
</div>
@endsection
