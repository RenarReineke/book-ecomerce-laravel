@extends('layouts.dashboard')
@section('seriesList')
<div class="h-full w-full relative flex flex-row-reverse">

    <x-filters url="{{route('series.index')}}">
        <x-series-filters></x-series-filters>
    </x-filters>

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
        <!-- Верхняя панель -->       
            <x-header title="Серии" formUrl="{{route('series.create')}}" searchUrl="{{route('series.index')}}"></x-header>
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
    </div>
</div>
@endsection
