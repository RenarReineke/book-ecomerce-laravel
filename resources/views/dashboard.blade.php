@extends('layout')

@section('dashboard')
<div class="flex flex-row h-screen">
    @include('layouts.sidebar')
    <div class="basis-11/12">
        @yield('statistic')
        @yield('clients')
    </div>
</div>
@endsection
