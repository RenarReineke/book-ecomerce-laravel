@extends('admin.layouts.dashboard')
@section('productUpdateForm')
    <x-modal-form title="Редактировать товар" url="{{ route('products.update', ['product' => $product]) }}">
        <x-product-form-items />
    </x-modal-form>
@endsection
