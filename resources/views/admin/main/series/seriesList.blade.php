@extends('layouts.dashboard')
@section('seriesList')
<h1 class="mx-auto mt-5 w-96 text-lg text-gray-700 text-center">
    Серии
    <!-- Форма на создание серии -->
    <form method="get" action="{{route('series.create')}}" class="mx-auto w-12">
                <button type="submit" class="h-full w-full">
                    <svg
                        class="w-8 h-8 text-sky-700/30 hover:text-sky-700"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </form>
</h1>
<div class="m-3 p-10 h-auto bg-sky-50">
    <table class="mx-auto w-full table-auto border-collapse border border-slate-400 bg-white text-md">
        <thead class="bg-slate-400">
            <tr class="h-10">
                <th class="border border-slate-300">Del</th>
                <th class="border border-slate-300">ID</th>
                <th class="border border-slate-300">Название</th>
                <th class="border border-slate-300">Edit</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($seriesList as $series)
            <tr class="h-10 hover:bg-slate-200 hover:cursor-pointer">
            <td class="text-center border border-slate-300 pl-4">
                    <!-- Удалить -->
                    <form
                        method="post"
                        action="{{route('series.destroy', ['series' => $series])}}"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="h-full w-full">
                            <svg
                                class="w-6 h-6 text-red-600 hover:text-red-800"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </form>
                </td>
                <td class="p-2 text-center border border-slate-300">
                    <!-- Ссылка на детальную страницу -->
                    <a href="{{route('series.show', ['series' => $series])}}" class="block hover:bg-slate-700 hover:text-white">
                        {{$series->id}}
                    </a>
                </td>
                <td class="p-2 text-center border border-slate-300">{{$series->title}}</td>
                <td class="pl-4 text-center border border-slate-300">
                    <!-- Редактировать -->
                    <form method="get" action="{{route('series.edit', ['series' => $series])}}">
                        @csrf
                        <button type="submit" class="h-full w-full">
                            <svg
                                class="w-6 h-6 text-cyan-600 hover:text-cyan-800"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z"
                                    clip-rule="evenodd"
                                />
                                <path
                                    d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z"
                                />
                                <path
                                    fill-rule="evenodd"
                                    d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$seriesList->links()}}
    </div>
</div>
@endsection
