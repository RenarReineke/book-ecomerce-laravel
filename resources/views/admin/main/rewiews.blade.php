@extends('layouts.dashboard')
@section('rewiews')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700 text-center">Отзывы</h1>
<div class="m-3 p-10 h-auto bg-indigo-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-lg">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID отзыва</th>
                <th class="border border-slate-300">Продукт</th>
                <th class="border border-slate-300">Пользователь</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rewiews as $rewiew)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <th class="border border-slate-300">{{$rewiew->id}}</th>
                <th class="border border-slate-300">{{$rewiew->product->title}}</th>
                <th class="border border-slate-300">{{$rewiew->user->name}}</th>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$rewiews->links()}}
    </div>
</div>
@endsection
