@extends('layouts.dashboard')
@section('carts')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">Корзины</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">ID корзины</th>
                <th class="border border-slate-300">Клиент</th>
                <th class="border border-slate-300">Дата обновления</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
                <td class="p-2 text-center border border-slate-300">
                    <a href="carts/{{$cart->id}}" class="block hover:bg-red-100">
                    {{$cart->id}}
                    </a>
                </td>
                <td class="p-2 text-center border border-slate-300">{{$cart->user->name}}</td>
                <td class="p-2 text-center border border-slate-300">{{$cart->updated_at}}</td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$carts->links()}}
    </div>
</div>
@endsection
