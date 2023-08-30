@extends('layouts.dashboard')
@section('images')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700 text-center">Изображения</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-lg">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Url</th>
                <th class="border border-slate-300">Продукт</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <th class="border border-slate-300">{{$image->id}}</th>
                <th class="border border-slate-300">{{$image->url}}</th>
                <th class="border border-slate-300">{{$image->product}}</th>
            </tr>
             @endforeach
        </tbody>
    </table>
</div>
@endsection
