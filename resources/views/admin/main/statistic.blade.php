@extends('admin.layouts.dashboard')
@section('statistic')
<h1 class="mx-auto p-3 w-96 text-2xl text-gray-700">Панель администратора</h1>
<!-- Разделительная линия -->
<div class="mb-2 mx-2 h-[2px] bg-slate-400"></div>

<div class="flex flex-wrap justify-around items-center w-full h-auto">
    <x-statistic-item title="Всего клиентов" info={{$total}} color="bg-yellow-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Завершенных заказов" info={{$total}} color="bg-green-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Отмененных заказов" info={{$total}} color="bg-indigo-500" colorBottom="border-red-600"></x-statistic-item>
    
    <x-statistic-item title="Куплено книг" info={{$total}} color="bg-blue-500" colorBottom="border-red-600"></x-statistic-item>
    
    <x-statistic-item title="Новых товаров" info={{$total}} color="bg-gray-500" colorBottom="border-red-600"></x-statistic-item>

</div>

<div class="flex flex-wrap justify-around items-center w-1/2 h-auto mx-auto mt-5 bg-slate-50">
    
    <x-statistic-item title="Всего товаров" info={{$total_products}} color="bg-gray-500" colorBottom="border-red-600"></x-statistic-item>
    
    <x-statistic-item title="Всего юзеров" info={{$total_users}} color="bg-yellow-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Всего заказов" info={{$total_orders}} color="bg-green-500" colorBottom="border-red-600"></x-statistic-item>
    
    <x-statistic-item title="Всего издательств" info={{$total_publishers}} color="bg-indigo-500" colorBottom="border-red-600"></x-statistic-item>

</div>
 @endsection
