@extends('admin.layouts.dashboard')
@section('authorDetail')

<x-page-detail 
    title="{{$author->name}}"
    listTitle="Авторы" 
    editLink="{{ route('authors.edit', ['author' => $author]) }}" 
    deleteLink="{{ route('authors.destroy', ['author' => $author]) }}"
    listLink="{{ route('authors.index') }}"
>
    
</x-page-detail>

@endsection