@extends('layouts.dashboard')
@section('clients')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700 text-center">Клиенты</h1>
<div class="m-3 p-10 h-auto bg-green-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-lg">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Name</th>
                <th class="border border-slate-300">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <th class="border border-slate-300">{{$client->id}}</th>
                <th class="border border-slate-300">{{$client->name}}</th>
                <th class="border border-slate-300">{{$client->email}}</th>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$clients->links()}}
    </div>
</div>
@endsection
