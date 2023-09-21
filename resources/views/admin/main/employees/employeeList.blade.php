@extends('admin.layouts.dashboard') @section('employeeList')
<x-page-list
    title="Сотрудники"
    formUrl="{{ route('employees.create') }}"
    indexUrl="{{ route('employees.index') }}"
    componentName="employee-filters"
>
    <!-- Таблица -->
    <div class="mx-auto w-3/4 text-sm font-medium text-slate-800">
        <!-- Заголовок таблицы -->
        <div
            class="h-12 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md"
        >
            <div class="p-2">ID</div>
            <div class="p-2">Имя</div>
            <div class="p-2">Должность</div>
            <div class="p-2">Действия</div>
        </div>

        <!-- Тело таблицы -->
        @foreach ($employees as $employee)
        <!-- Строка таблицы -->
        <div
            class="h-20 w-full grid grid-cols-[1fr_3fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md"
        >
            <div class="p-2 flex justify-start items-center">
                {{$employee->id}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$employee->name}}
            </div>

            <div class="p-2 flex justify-start items-center">
                {{$employee->role->title}}
            </div>

            <!-- Действия -->
            <x-action-list
                detail-link="{{route('employees.show', ['employee' => $employee])}}"
                edit-link="{{route('employees.edit', ['employee' => $employee])}}"
                delete-link="{{route('employees.destroy', ['employee' => $employee])}}"
            >
            </x-action-list>
        </div>
        @endforeach
    </div>
    <div id="pagination" class="mt-3">
        {{$employees->links()}}
    </div>
</x-page-list>
@endsection
