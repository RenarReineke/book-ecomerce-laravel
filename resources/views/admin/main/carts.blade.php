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
                <td class="text-center border border-slate-300">
                    <form method="post" action="carts/{{$cart->id}}/delete" onSubmit="console.log('SUBMIT')" class="">
                        @csrf
                        <button type="submit" class="h-full w-full">
                            <svg
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-10 h-10 text-red-600"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </form>
                </td>
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
