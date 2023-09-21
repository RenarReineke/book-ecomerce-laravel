@extends('admin.layouts.dashboard') @section('seriesList')
<x-page-list
    title="Серии"
    formUrl="{{ route('series.create') }}"
    indexUrl="{{ route('series.index') }}"
    componentName="series-filters"
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
        @foreach ($seriesList as $series)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 w-5 flex justify-start items-center">
                {{$series->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$series->title}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('series.show', ['series' => $series])}}"
                edit-link="{{route('series.edit', ['series' => $series])}}"
                delete-link="{{route('series.destroy', ['series' => $series])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$seriesList->links()}}
    </div>
</x-page-list>
@endsection
