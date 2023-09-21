@extends('admin.layouts.dashboard')
@section('categoryDetail')

<x-page-detail 
    title="Категория {{$category->id}}" 
    editLink="{{ route('categories.edit', ['category' => $category]) }}" 
    deleteLink="{{ route('categories.destroy', ['category' => $category]) }}"
    listLink="{{ route('categories.index') }}"
>
</x-page-detail>

@endsection