@extends('layouts.dashboard')
@section('authors')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700 text-center">Авторы</h1>
<div class="m-3 p-10 h-auto bg-indigo-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-lg">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Имя</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <th class="border border-slate-300">{{$author->id}}</th>
                <th class="border border-slate-300">{{$author->name}}</th>
                
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$authors->links()}}
    </div>
</div>
@endsection
