@extends('admin.layouts.dashboard')
@section('clientDetail')

<x-page-detail 
    title="{{$client->name}}"
    listTitle="Клиенты" 
    editLink="{{ route('clients.edit', ['client' => $client]) }}" 
    deleteLink="{{ route('clients.destroy', ['client' => $client]) }}"
    listLink="{{ route('clients.index') }}"
>
</x-page-detail>

@endsection