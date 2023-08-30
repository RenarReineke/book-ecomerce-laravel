@extends('layouts.dashboard')
@section('authors')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">Авторы</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Имя</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">{{$author->id}}</td>
                <td class="p-2 text-center border border-slate-300">{{$author->name}}</td>
                
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$authors->links()}}
    </div>
</div>
@endsection
