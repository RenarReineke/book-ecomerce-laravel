@extends('admin.layouts.dashboard')
@section('rewiewCreateForm')
<x-modal-form title="Добавить отзыв" url="{{ route('rewiews.store') }}">
    <x-rewiew-form-items/>
</x-modal-form>
@endsection