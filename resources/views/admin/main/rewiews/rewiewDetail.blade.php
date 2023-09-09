@extends('layouts.dashboard')
@section('rewiewDetail')
<h1
    class="mt-5 w-full text-center text-lg text-gray-700 flex justify-center items-center"
>
    Отзыв <span class="mx-1 font-bold">№ {{$rewiew->id}}
    </span> клиента  <span class="mx-1 font-bold">{{$rewiew->user->name}}</span>
    на товар <span class="ml-1 font-bold">№ {{$rewiew->product->id}}</span>
    <span class="ml-1 font-bold">{{$rewiew->product->title}}</span>
</h1>
<div class="m-3 p-10 h-auto bg-slate-100">

    <!-- Фото товара, загруженные юзером -->
    <div>
        @foreach ($rewiew->images() as $image)
            @if ($image)
                <img src="{{ asset('storage/' . $image->url) }}" alt="Фото от юзера" class="h-20 w-20 border-2 border-slate-600 rounded-md">
            @endif
        @endforeach
    </div>

    <!-- Отзыв -->
    <div class="mx-auto w-1/2 text-md space-y-8 bg-white p-4 rounded-lg">
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Преимущества</h6>
            <p class="text-slate-600">{{$rewiew->profit}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Недостатки</h6>
            <p class="text-slate-600">{{$rewiew->unprofit}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Дополнительный комментарий</h6>
            <p class="text-slate-600">{{$rewiew->text}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1 flex justify-between">
            <p class="font-medium text-slate-900">Лайки: <span class="ml-1 text-slate-500">{{$rewiew->likes->count()}}</span></p>
            <p class="font-medium text-slate-900">Оценка товара: <span class="mx-1 text-slate-500">{{$rewiew->rating}} из 5</span></p>
        </div>

        <!-- Комментарии -->
    <div class="flex flex-col items-end space-y-2">
        <h6 class="font-medium text-slate-900 mr-64">Комментарии ({{$rewiew->comments->count()}}):</h6>
        <ul class="w-[500px] bg-white divide-y divide-slate-200">
            @foreach ($rewiew->comments as $comment)
                <li class="p-4">
                    <div class="rounded-t-lg flex bg-slate-700 p-1">
                        <img src="{{Vite::asset('resources/images/avatar.jpg')}}" alt="Аватарка пользователя" class="h-10 w-10 rounded-full">
                        <div class="ml-3 text-sm font-medium text-slate-100 overflow-hidden">
                            <div>{{$comment->user->name}}</div>
                            <div class="text-slate-300">{{$comment->updated_at}}</div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-500 overflow-hidden">{{$comment->message}}
                        egegegegherhrhthhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh
                    </p>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
</div>
@endsection
