@extends('layouts.dashboard')
@section('rewiewDetail')

<x-page-detail 
    title="Серия {{$series->id}}" 
    editLink="{{ route('series.edit', ['series' => $series]) }}" 
    deleteLink="{{ route('series.destroy', ['series' => $series]) }}"
    listLink="{{ route('series.index') }}"
>
</x-page-detail>

@endsection