@extends('layouts.dashboard')
@section('publishers')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">Издатели</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Название</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($publishers as $publisher)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">{{$publisher->id}}</td>
                <td class="p-2 text-center border border-slate-300">{{$publisher->title}}</td>
                
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$publishers->links()}}
    </div>
</div>
@endsection
