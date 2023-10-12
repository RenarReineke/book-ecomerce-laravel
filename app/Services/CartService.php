<?php

namespace App\Services;

use App\DTO\Cart\CartCreateDto;
use App\DTO\Cart\CartUpdateDto;
use App\Models\Cart;
use App\Models\Product;

final class CartService
{
    public function create(CartCreateDto $dto): Cart
    {
        $cart = new Cart();

        $cart->client()->associate($dto->client);

        $cart->save();

        foreach ($dto->products as $product_item) {
            $product = Product::findOrFail($product_item['id']);

            $cart->products()->attach($product, ['amount' => $product_item['amount']]);
        }

        $cart->push();

        return $cart;
    }

    public function removeCartItem(CartUpdateDto $dto, Cart $cart): Cart
    {
        $product = Product::findOrFail($dto->product_id);

        $cart->products()->detach($product);

        $cart->push();

        return $cart;
    }

    public function addCartItem(CartUpdateDto $dto, Cart $cart): Cart
    {
        $product = Product::findOrFail($dto->product_id);

        // Если продукта в корзине нет, то добавить
        if (! $cart->products->contains($product)) {
            $cart->products()->attach($product, ['amount' => 1]);

            return $cart;
        }

        //Иначе если продукт уже есть в корзине, то
        // Найти объект в промежуточной пивот таблице
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        // увеличить его значение на 1
        $cartItem->update(['amount' => $cartItem->amount + 1]);
        // $cart->products()->updateExistingPivot($item_id, ['amount' => $cartItem->amount + 1]);

        $cart->push();

        return $cart;
    }

    public function increaseAmount(CartUpdateDto $dto, Cart $cart): Cart
    {
        $product = Product::findOrFail($dto->product_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        $cartItem->update(['amount' => $cartItem->amount + 1]);
        $cart->push();

        return $cart;
    }

    public function decreaseAmount(CartUpdateDto $dto, Cart $cart): Cart
    {
        $product = Product::findOrFail($dto->product_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        $cartItem->update(['amount' => $cartItem->amount - 1]);
        $cart->push();

        return $cart;
    }

    public function changeAmount(CartUpdateDto $dto, Cart $cart): Cart
    {
        $product = Product::findOrFail($dto->product_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        // $totalCount = $cartItem->amount + $count;
        if ($dto->amount > 0) {
            $cartItem->update(['amount' => $dto->amount]);
        } else {
            $cartItem->delete();
        }
        $cart->push();

        return $cart;
    }
}
