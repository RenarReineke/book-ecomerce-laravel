@extends('layouts.dashboard')
@section('authorList')
<div class="relative flex flex-row-reverse h-full bg-sky-50 border-4 rounded-lg">

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
        <!-- Верхняя панель -->       
            <x-header title="Авторы" formUrl="{{route('authors.create')}}" searchUrl="{{route('authors.index')}}"></x-header>
        <!-- Верхняя панель конец -->

        <!-- Разделительная линия -->
        <div class="mb-6 h-[2px] bg-slate-400"></div>

        <!-- Таблица -->
        <div class="mx-auto w-1/2 text-sm font-medium text-slate-800">
            <!-- Заголовок таблицы -->
            <div
                class="h-12 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
            >
                <div class="p-2 w-5">ID</div>
                <div class="p-2 w-20">Имя</div>
                <div class="p-2 w-10">Действия</div>
            </div>

            <!-- Тело таблицы -->
            @foreach ($authors as $author)
            <!-- Строка таблицы -->
            <div
                class="h-20 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
            >
                <div class="p-2 w-5 flex justify-start items-center">
                    {{$author->id}}
                </div>

                <div class="p-2 flex justify-start items-center">
                    {{$author->name}}
                </div>

                <!-- Действия -->
                <x-action-list 
                    detail-link="{{route('authors.show', ['author' => $author])}}"
                    edit-link="{{route('authors.edit', ['author' => $author])}}"
                    delete-link="{{route('authors.destroy', ['author' => $author])}}"
                    >
                </x-action-list>

            </div>
            @endforeach
        </div>
        <div id="pagination" class="mt-3">
            {{$authors->links()}}
        </div>
    </div>
</div>
@endsection
