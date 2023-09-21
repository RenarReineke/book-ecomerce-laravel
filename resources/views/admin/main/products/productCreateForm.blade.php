@extends('admin.layouts.dashboard')
@section('productCreateForm')
<x-modal-form title="Добавить товар" url="{{ route('products.store') }}">
    <x-product-form-items/>
</x-modal-form>
@endsection