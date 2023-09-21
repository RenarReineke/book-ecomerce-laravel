@extends('admin.layouts.dashboard') @section('tagList')
<x-page-list
    title="Теги"
    formUrl="{{ route('tags.create') }}"
    indexUrl="{{ route('tags.index') }}"
    componentName="tag-filters"
>
    <!-- Таблица -->
    <div class="mx-auto w-1/2 text-sm font-medium text-slate-800">
        <!-- Заголовок таблицы -->
        <div
            class="h-12 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
        >
            <div class="p-2 w-5">ID</div>
            <div class="p-2 w-20">Название</div>
            <div class="p-2 w-10">Действия</div>
        </div>

        <!-- Тело таблицы -->
        @foreach ($tags as $tag)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 w-5 flex justify-start items-center">
                {{$tag->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$tag->title}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('tags.show', ['tag' => $tag])}}"
                edit-link="{{route('tags.edit', ['tag' => $tag])}}"
                delete-link="{{route('tags.destroy', ['tag' => $tag])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$tags->links()}}
    </div>
</x-page-list>
@endsection
