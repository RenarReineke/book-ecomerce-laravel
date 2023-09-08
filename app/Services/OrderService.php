<?php

namespace App\Services;

use App\Enums\OrderStatusEnum;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

final class OrderService
{
    public function saveOrder(array $request, Cart $cart)
    {   
        // Создать новый заказ по данным юзера, необходимым для покупки и доставки 
        $order = new Order();
        $order->phone = $request['phone'];
        $order->address = $request['address'];

        // Поставить заказу статус 'Оформлен'
        $order->status = OrderStatusEnum::Processed;

        // Связать заказ с юзером, по чьей корзине формируется заказ
        $order->user()->associate($cart->user);
        $order->save();
        
        // Все продукты из корзины присоединить к заказу с указанием количества каждого продукта
        foreach($cart->products as $product)
        {
            if($product->amount < 1) continue;
            $order->products()->attach($product, ['amount' => $product->pivot->amount]);

            // Уменьшить количество продукта в магазине
            $amountDiff = $product->amount - $product->pivot->amount;
            Product::where('id', $product->id)->update(['amount' => $amountDiff]);
        }

        $order->push();

        // Удалить корзину
        $cart->delete();

        return $order;
    }
}
