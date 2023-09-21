@extends('admin.layouts.dashboard') @section('authorList')
<x-page-list
    title="Авторы"
    formUrl="{{ route('authors.create') }}"
    indexUrl="{{ route('authors.index') }}"
    componentName="author-filters"
>
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
</x-page-list>
@endsection
