@extends('dashboard') @section('statistic')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700">Панель администратора</h1>

<div class="mx-auto mt-20 w-1/12 h-[60px] flex flex-col items-center justify-center font-bold bg-yellow-400 text-2xl text-gray-900 rounded-xl border-b-8 border-red-600">
    <div class="text-sm">Всего клиентов:</div>
    <div class="text-2xl">{{$total}}</div>
</div>
 @endsection
