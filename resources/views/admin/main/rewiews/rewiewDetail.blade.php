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
        <h6 class="font-medium text-slate-900 mr-64">
            Комментарии ({{$rewiew->comments->count()}})
            <a href="{{route('comments.create', ['rewiew_id' => $rewiew->id])}}" class="mx-auto w-12 block">
                <svg
                    class="w-8 h-8 text-sky-700/30 hover:text-sky-700"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
        </h6>
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
                    <p class="text-sm text-slate-500 overflow-hidden">{{$comment->message}}</p>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
</div>
@endsection
