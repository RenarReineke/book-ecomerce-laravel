@extends('layouts.dashboard')
@section('clientList')
<div class="h-full w-full relative flex flex-row-reverse">

    <x-filters url="{{route('clients.index')}}">
        <x-client-filters></x-client-filters>
    </x-filters>

    <!-- Main -->
    <div class="p-10 pt-4 px-5 h-auto w-full bg-sky-50">
        <!-- Верхняя панель -->       
            <x-header title="Клиенты" formUrl="{{route('clients.create')}}" searchUrl="{{route('clients.index')}}"></x-header>
        <!-- Верхняя панель конец -->

        <!-- Разделительная линия -->
        <div class="mb-6 h-[2px] bg-slate-400"></div>

        <!-- Таблица -->
        <div class="mx-auto w-3/4 text-sm font-medium text-slate-800">
            <!-- Заголовок таблицы -->
            <div
                class="h-12 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
            >
                <div class="p-2">ID</div>
                <div class="p-2">Имя</div>
                <div class="p-2">Почта</div>
                <div class="p-2">Действия</div>
            </div>

            <!-- Тело таблицы -->
            @foreach ($clients as $client)
            <!-- Строка таблицы -->
            <div
                class="h-20 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
            >
                <div class="p-2 flex justify-start items-center">
                    {{$client->id}}
                </div>

                <div class="p-2 flex justify-start items-center">
                    {{$client->name}}
                </div>

                <div class="p-2 flex justify-start items-center">
                    {{$client->email}}
                </div>

                <!-- Действия -->
                <x-action-list 
                    detail-link="{{route('clients.show', ['client' => $client])}}"
                    edit-link="{{route('clients.edit', ['client' => $client])}}"
                    delete-link="{{route('clients.destroy', ['client' => $client])}}"
                    >
                </x-action-list>

            </div>
            @endforeach
        </div>
        <div id="pagination" class="mt-3">
            {{$clients->links()}}
        </div>
    </div>
</div>
@endsection
