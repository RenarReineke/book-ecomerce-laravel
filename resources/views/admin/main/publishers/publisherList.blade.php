@extends('admin.layouts.dashboard') @section('publisherList')
<x-page-list
    title="Издатели"
    formUrl="{{ route('publishers.create') }}"
    indexUrl="{{ route('publishers.index') }}"
    componentName="publisher-filters"
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
        @foreach ($publishers as $publisher)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 w-5 flex justify-start items-center">
                {{$publisher->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$publisher->title}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('publishers.show', ['publisher' => $publisher])}}"
                edit-link="{{route('publishers.edit', ['publisher' => $publisher])}}"
                delete-link="{{route('publishers.destroy', ['publisher' => $publisher])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$publishers->links()}}
    </div>
</x-page-list>
@endsection
