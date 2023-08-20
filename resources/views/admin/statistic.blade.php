@extends('dashboard') @section('statistic')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700">Панель администратора</h1>

<div class="flex justify-around items-center w-full h-auto">
    <x-statistic-item title="Всего клиентов" info={{$total}} color="bg-yellow-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Завершенных заказов" info={{$total}} color="bg-green-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Куплено книг" info={{$total}} color="bg-blue-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Новых товаров" info={{$total}} color="bg-gray-500" colorBottom="border-red-600"></x-statistic-item>

    <x-statistic-item title="Отмененных заказов" info={{$total}} color="bg-indigo-500" colorBottom="border-red-600"></x-statistic-item>
</div>
 @endsection
