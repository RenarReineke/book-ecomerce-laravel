@extends('admin.layouts.dashboard')
@section('productDetail')

<x-page-detail 
    title="Продукт {{$product->id}}" 
    editLink="{{ route('products.edit', ['product' => $product]) }}" 
    deleteLink="{{ route('products.destroy', ['product' => $product]) }}"
    listLink="{{ route('products.index') }}"
>
    <div>Страница продуктов</div>
</x-page-detail>

@endsection