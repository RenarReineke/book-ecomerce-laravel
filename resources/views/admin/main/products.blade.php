@extends('layouts.dashboard')
@section('products')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">Товары</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="p-2 border border-slate-300">ID</th>
                <th class="p-2 border border-slate-300">Название</th>
                <th class="p-2 border border-slate-300">Цена</th>
                <th class="p-2 border border-slate-300">Рейтинг</th>
                <th class="p-2 border border-slate-300">Страниц</th>
                <th class="p-2 border border-slate-300">Тип обложки</th>
                <th class="p-2 border border-slate-300">Вес</th>
                <th class="p-2 border border-slate-300">Серия</th>
                <th class="p-2 border border-slate-300">Издатель</th>
                <th class="p-2 border border-slate-300">Год выпуска</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">{{$product->id}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->title}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->price}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->rating}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->pages}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->cover_type}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->weight}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->series->title}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->series->publisher->title}}</td>
                <td class="p-2 text-center border border-slate-300">{{$product->year}}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$products->links()}}
    </div>
</div>
@endsection
