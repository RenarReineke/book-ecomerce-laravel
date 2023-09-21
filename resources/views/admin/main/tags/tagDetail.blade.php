@extends('admin.layouts.dashboard') @section('tagDetail')

    <x-page-detail 
        title="{{$tag->title}}"
        listTitle="Теги" 
        editLink="{{ route('tags.edit', ['tag' => $tag]) }}" 
        deleteLink="{{ route('tags.destroy', ['tag' => $tag]) }}"
        listLink="{{ route('tags.index') }}"
    >
        <div>Содержимое страницы тега</div>
    </x-page-detail>
    
@endsection
