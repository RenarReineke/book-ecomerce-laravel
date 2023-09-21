@extends('admin.layouts.dashboard')
@section('productDetail')

<x-page-detail 
    title="{{$product->title}}"
    listTitle="Товары" 
    editLink="{{ route('products.edit', ['product' => $product]) }}" 
    deleteLink="{{ route('products.destroy', ['product' => $product]) }}"
    listLink="{{ route('products.index') }}"
>
    <div>Страница продуктов</div>
</x-page-detail>

@endsection