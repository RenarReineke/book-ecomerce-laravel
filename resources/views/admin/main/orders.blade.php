@extends('layouts.dashboard')
@section('orders')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700 text-center">Заказы</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-lg">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID заказа</th>
                <th class="border border-slate-300">Клиент</th>
                <th class="border border-slate-300">Количество продуктов</th>
                <th class="border border-slate-300">Дата формирования</th>
                <th class="border border-slate-300">Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <th class="border border-slate-300">{{$order->id}}</th>
                <th class="border border-slate-300">{{$order->user->name}}</th>
                <th class="border border-slate-300">{{$order->products_count ?? 0}}</th>
                <th class="border border-slate-300">{{$order->created_at}}</th>
                <th class="border border-slate-300">Оплачен</th>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$orders->links()}}
    </div>
</div>
@endsection
