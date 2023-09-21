@extends('admin.layouts.dashboard') @section('rewiewDetail')



<x-page-detail 
    title="Отзыв {{$rewiew->id}}"
    listTitle="Отзывы" 
    editLink="{{ route('rewiews.edit', ['rewiew' => $rewiew]) }}" 
    deleteLink="{{ route('rewiews.destroy', ['rewiew' => $rewiew]) }}"
    listLink="{{ route('rewiews.index') }}"
>
    <h1
        class="mb-3 w-fulltext-center text-lg text-gray-700 flex justify-center items-center"
    >
        Отзыв </span> клиента
        <span class="mx-1 font-bold capitalize">{{$rewiew->user->name}}</span>
        на товар
        <span class="ml-1 font-bold">№ {{$rewiew->product->id}}</span>
        <span
            class="ml-1 font-bold capitalize"
            >{{$rewiew->product->title}}</span
        >
    </h1>

    <!-- Фото товара, загруженные юзером -->
    <div>
        @foreach ($rewiew->images() as $image) @if ($image)
        <img
            src="{{ asset('storage/' . $image->url) }}"
            alt="Фото от юзера"
            class="h-20 w-20 border-2 border-slate-600 rounded-md"
        />
        @endif @endforeach
    </div>

    <!-- Отзыв -->
    <div class="mx-auto w-1/2 text-md space-y-8 bg-white p-4 rounded-lg">
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Преимущества</h6>
            <p class="text-slate-600">{{$rewiew->profit}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">Недостатки</h6>
            <p class="text-slate-600">{{$rewiew->unprofit}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1">
            <h6 class="font-medium text-slate-900">
                Дополнительный комментарий
            </h6>
            <p class="text-slate-600">{{$rewiew->text}}</p>
        </div>
        <div class="shadow-lg rounded-lg p-4 pt-1 flex justify-between">
            <p class="font-medium text-slate-900">
                Лайки:
                <span
                    class="ml-1 text-slate-500"
                    >{{$rewiew->likes->count()}}</span
                >
            </p>
            <p class="font-medium text-slate-900">
                Оценка товара:
                <span class="mx-1 text-slate-500"
                    >{{$rewiew->rating}} из 5</span
                >
            </p>
        </div>

        <!-- Комментарии -->
        <div class="flex flex-col items-end space-y-2">
            <h6 class="font-medium text-slate-900 mr-64">
                Комментарии ({{$rewiew->comments->count()}})

                <!-- Форма на создание комментария -->
                <form
                    method="get"
                    action="{{ route('comments.create') }}"
                    class="mx-auto w-12"
                >
                    <input
                        type="hidden"
                        name="rewiew_id"
                        value="{{$rewiew->id}}"
                    />
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
            </h6>
            <!-- Список комментириев -->
            <ul class="w-[500px] bg-white divide-y divide-slate-200">
                @foreach ($rewiew->comments as $comment)
                <li class="p-4">
                    <!-- Заголовок комментария -->
                    <div
                        class="rounded-t-lg flex justify-between bg-slate-700 p-1 px-2"
                    >
                        <div class="flex">
                            <img
                                src="{{Vite::asset('resources/images/avatar.jpg')}}"
                                alt="Аватарка пользователя"
                                class="h-10 w-10 rounded-full"
                            />
                            <div
                                class="ml-3 text-sm font-medium text-slate-100 overflow-hidden"
                            >
                                <div>{{$comment->user->name}}</div>
                                <div class="text-slate-300">
                                    {{$comment->updated_at}}
                                </div>
                            </div>
                        </div>

                        <!-- Формы удаления/редактирования -->
                        <div class="flex space-x-1">
                            <!-- Удалить коммент -->
                            <form
                                method="post"
                                action="{{route('comments.destroy', ['comment' => $comment])}}"
                            >
                                @csrf @method('DELETE')
                                <button type="submit" class="h-full w-full">
                                    <svg
                                        class="w-5 h-5 text-red-500 hover:text-red-400"
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

                            <!-- Редактировать коммент -->
                            <form
                                method="get"
                                action="{{route('comments.edit', ['comment' => $comment])}}"
                            >
                                @csrf
                                <input
                                    type="hidden"
                                    name="rewiew_id"
                                    value="{{$rewiew->id}}"
                                />
                                <button type="submit" class="h-full w-full">
                                    <svg
                                        class="w-5 h-5 text-cyan-400 hover:text-cyan-300"
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
                        </div>
                    </div>
                    <!-- Текст комментария -->
                    <p class="text-sm text-slate-500 overflow-hidden">
                        {{$comment->message}}
                    </p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-page-detail>

@endsection
