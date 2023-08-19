@extends('dashboard')

@section('clients')
<h1 class="mx-auto mt-10 w-96 text-2xl text-gray-700">Клиенты</h1>
@foreach ($users as $user)
    <div class="mx-auto mt-20 w-2/3 flex bg-zinc-300">
        <div class="basis-1/12">{{$user->id}}</div>
        <div class="basis-5/12">{{$user->name}}</div>
        <div class="basis-6/12">{{$user->email}}</div>
    </div>
@endforeach
@endsection