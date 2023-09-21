@extends('admin.layouts.dashboard')
@section('rewiewUpdateForm')
<x-modal-form title="Редактировать отзыв" url="{{ route('rewiews.update', ['rewiew' => $rewiew]) }}">
    <x-rewiew-form-items/>
</x-modal-form>
@endsection