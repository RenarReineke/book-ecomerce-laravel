@extends('layouts.dashboard')
@section('employeeDetail')

<x-page-detail 
    title="Отзыв {{$employee->id}}" 
    editLink="{{ route('employees.edit', ['employee' => $employee]) }}" 
    deleteLink="{{ route('employees.destroy', ['employee' => $employee]) }}"
    listLink="{{ route('employees.index') }}"
>
</x-page-detail>

@endsection