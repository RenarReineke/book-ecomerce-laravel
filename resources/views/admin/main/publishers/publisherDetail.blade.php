@extends('admin.layouts.dashboard')
@section('rewiewDetail')

<x-page-detail 
    title="{{$publisher->title}}"
    listTitle="Издатели" 
    editLink="{{ route('publishers.edit', ['publisher' => $publisher]) }}" 
    deleteLink="{{ route('publishers.destroy', ['publisher' => $publisher]) }}"
    listLink="{{ route('publishers.index') }}"
>
</x-page-detail>

@endsection