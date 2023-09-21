@extends('admin.layouts.dashboard')
@section('images')
<x-page-list
    title="Изображения"
    formUrl="{{ route('images.create') }}"
    indexUrl="{{ route('images.index') }}"
    componentName="image-filters"
>
    <!-- Таблица -->
    <div class="mx-auto w-1/2 text-sm font-medium text-slate-800">
        <!-- Заголовок таблицы -->
        <div
            class="h-12 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
        >
            <div class="p-2 w-5">ID</div>
            <div class="p-2 w-20">URL</div>
            <div class="p-2 w-20">Товар</div>
            <div class="p-2 w-10">Действия</div>
        </div>

        <!-- Тело таблицы -->
        @foreach ($images as $image)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 w-5 flex justify-start items-center">
                {{$image->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$image->user->name}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$image->created_at}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('images.show', ['image' => $image])}}"
                edit-link="{{route('images.edit', ['image' => $image])}}"
                delete-link="{{route('images.destroy', ['image' => $image])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$images->links()}}
    </div>
</x-page-list>
@endsection
