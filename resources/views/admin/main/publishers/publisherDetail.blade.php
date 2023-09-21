@extends('admin.layouts.dashboard')
@section('rewiewDetail')

<x-page-detail 
    title="Издатель {{$publisher->id}}" 
    editLink="{{ route('publishers.edit', ['publisher' => $publisher]) }}" 
    deleteLink="{{ route('publishers.destroy', ['publisher' => $publisher]) }}"
    listLink="{{ route('publishers.index') }}"
>
</x-page-detail>

@endsection