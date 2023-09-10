@extends('layouts.dashboard')
@section('employeeList')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">
    Сотрудники
    <!-- Форма на создание сотрудника -->
    <form method="get" action="{{route('employees.create')}}" class="mx-auto w-12">
                <button type="submit" class="h-full w-full">
                    <svg
                        class="w-8 h-8 text-sky-700/30 hover:text-sky-700"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </form>
</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Имя</th>
                <th class="border border-slate-300">Должность</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">{{$employee->id}}</td>
                <td class="p-2 text-center border border-slate-300">{{$employee->name}}</td>
                <td class="p-2 text-center border border-slate-300">{{$employee->role->title}}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$employees->links()}}
    </div>
</div>
@endsection
