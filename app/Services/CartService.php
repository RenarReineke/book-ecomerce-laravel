<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

final class CartService
{
    public function removeCartItem(Cart $cart, int $item_id,): Cart
    {  
        $product = Product::findOrFail($item_id);
        
        $cart->products()->detach($product);        
               
        $cart->push();
        
        return $cart;
    }

    public function addCartItem(Cart $cart, int $item_id,): Cart
    {  
        $product = Product::findOrFail($item_id);

        // Если продукта в корзине нет, то добавить
        if(!$cart->products->contains($product))
        {   
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

    public function increaseAmount(Cart $cart, int $item_id): Cart
    {
        $product = Product::findOrFail($item_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        $cartItem->update(['amount' => $cartItem->amount + 1]);
        $cart->push();       
        return $cart;
    }

    public function decreaseAmount(Cart $cart, int $item_id): Cart
    {
        $product = Product::findOrFail($item_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        $cartItem->update(['amount' => $cartItem->amount - 1]);
        $cart->push();       
        return $cart;
    }

    public function changeAmount(Cart $cart, int $item_id, int $amount): Cart
    {
        $product = Product::findOrFail($item_id);
        $cartItem = $cart->products()->where('product_id', $product->id)->first()->pivot;
        // $totalCount = $cartItem->amount + $count;
        if($amount > 0)
        {
            $cartItem->update(['amount' => $amount]);
        } else
        {
            $cartItem->delete();
        }
        $cart->push();       
        return $cart;
    }
}
