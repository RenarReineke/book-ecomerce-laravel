@extends('admin.layouts.dashboard') @section('orderList')
    <x-page-list title="Заказы" formUrl="{{ route('orders.create') }}" indexUrl="{{ route('orders.index') }}"
        componentName="order-filters">
        <!-- Таблица -->
        <div class="mx-auto w-full text-sm font-medium text-slate-800">
            <!-- Заголовок таблицы -->
            <div
                class="h-12 w-full grid grid-cols-[1fr_3fr_2fr_2fr_3fr_4fr] gap-x-3 justify-items-center bg-slate-200 rounded-t-md">
                <div class="p-2 w-5">ID</div>
                <div class="p-2 w-20">Клиент</div>
                <div class="p-2 w-20">Статус</div>
                <div class="p-2 w-20">Оплата</div>
                <div class="p-2 w-20">Дата</div>
                <div class="p-2 w-10">Действия</div>
            </div>

            <!-- Тело таблицы -->
            @foreach ($orders as $order)
                <!-- Строка таблицы -->
                <div
                    class="h-20 w-full grid grid-cols-[1fr_3fr_2fr_2fr_3fr_4fr] gap-x-3 justify-items-center mb-2 capitalize rounded-md bg-white text-slate-600 shadow-md">
                    <div class="p-2 w-5 flex justify-start items-center">
                        {{ $order->id }}
                    </div>

                    <div class="p-2 flex justify-start items-center">
                        {{ $order->client->name }}
                    </div>

                    <div class="p-2 flex justify-start items-center">
                        {{ $order->status }}
                    </div>

                    <div class="p-2 flex justify-start items-center">
                        {{ $order->payment }}
                    </div>

                    <div class="p-2 flex justify-start items-center">
                        {{ $order->created_at }}
                    </div>

                    <!-- Действия -->
                    <x-action-list detail-link="{{ route('orders.show', ['order' => $order]) }}"
                        edit-link="{{ route('orders.edit', ['order' => $order]) }}"
                        delete-link="{{ route('orders.destroy', ['order' => $order]) }}">
                    </x-action-list>
                </div>
            @endforeach
        </div>
        <div id="pagination" class="mt-3">
            {{ $orders->links() }}
        </div>
    </x-page-list>
@endsection
