<?php

namespace App\Services;

use App\DTO\Order\OrderCreateDto;
use App\DTO\Order\OrderUpdateDto;
use App\Enums\OrderStatusEnum;
use App\Exceptions\BusinessException;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

final class OrderService
{
    public function save(OrderCreateDto $dto): Order
    {
        $order = DB::transaction(function () use ($dto) {
            // Создать новый заказ по данным юзера, необходимым для покупки и доставки
            $order = new Order();
            $order->phone = $dto->phone;
            $order->address = $dto->address;

            // Поставить заказу статус 'Оформлен'
            $order->status = OrderStatusEnum::Processed;

            // Получить корзину клиента
            $cart = $dto->client->carts->first();
            if (! $cart) {
                throw new BusinessException('Корзина отсутствует');
            }

            // Связать заказ с клиентом
            $order->client()->associate($dto->client);
            $order->save();

            // Все продукты из корзины присоединить к заказу с указанием количества каждого продукта
            foreach ($cart->products as $product) {
                if ($product->amount < 1) {
                    continue;
                }
                $order->products()->attach($product, ['amount' => $product->pivot->amount]);

                // Уменьшить количество продукта в магазине
                $amountDiff = $product->amount - $product->pivot->amount;
                Product::where('id', $product->id)->update(['amount' => $amountDiff]);
            }

            $order->push();

            // Отправить письмо на почту юзеру с уведомлением о создании заказа
            Mail::to($order->user->email)->send(new OrderShipped($order));

            // Удалить корзину
            $cart->delete();
        });

        return $order;
    }

    public function update(OrderUpdateDto $dto, Order $order)
    {
        if (! $order->update($dto->toArray())) {
            throw new BusinessException('Не удалось обновить заказ');
        }

        $order->push();

        return $order;
    }
}
