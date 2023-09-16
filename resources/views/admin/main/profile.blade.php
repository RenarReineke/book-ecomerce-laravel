@extends('layouts.dashboard')

@section('profile')

    <h1 class="pl-4 h-14 flex justify-center items-center bg-slate-100 text-xl text-gray-700 capitalize">
        Профиль {{$user->name}}
        <img class="ml-2 w-12 h-12 object-cover border-2 border-slate-600 rounded-full" src="{{ Vite::asset('resources/images/avatar.jpg') }}" alt="">
    </h1>
    <!-- Разделительная линия -->
    <div class="mb-2 mx-2 h-[2px] bg-slate-400"></div>

    <div class="mx-auto w-1/2 mt-10 p-2 flex flex-col justify-center items-center text-gray-700 bg-slate-100 border-4 border-slate-600 rounded-md">
        <h3 class="text-lg capitalize">Должность {{$user->role->title}}</h3>
        <div>Зачислен {{$user->created_at}}</div>
        <div>Почта {{$user->email}}</div>
    </div>


@endsection