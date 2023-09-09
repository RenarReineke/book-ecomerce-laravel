@extends('layouts.dashboard')
@section('commentDetail')
<h1
    class="mt-5 w-full text-center text-lg text-gray-700 flex justify-center items-center"
>
    Комментарий <span class="mx-1 font-bold">№ {{$comment->id}}
    </span> клиента  <span class="mx-1 font-bold">{{$comment->user->name}}</span>
    на отзыв <span class="ml-1 font-bold">№ {{$comment->rewiew->id}}</span>
    клиента <span class="ml-1 font-bold">{{$comment->rewiew->user}}</span>
</h1>
<div class="m-3 p-10 h-auto bg-slate-100">

    <!-- Отзыв -->
    <div class="mx-auto w-1/2 text-md space-y-8 bg-white p-4 rounded-lg">
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Дата</h6>
            <p class="text-slate-600">{{$comment->updated_at}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Сообщение</h6>
            <p class="text-slate-600">{{$comment->text}}</p>
        </div>
    </div>
</div>
@endsection
