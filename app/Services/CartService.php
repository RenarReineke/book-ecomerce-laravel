<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

final class CartService
{
    public function removeCartItem(Cart $cart, int $item_id,): Cart
    {
        // Преобразовать массив объектов из реквеста в массив айдишников продуктов
        // $productIdList = array_map(fn($item) => $item['id'], $request->products);

        // array_filter($cart->products, fn($item) => $item->id not in $productsIdList);

        
        $product = Product::findOrFail($item_id);
        // $product->carts()->wherePivot('cart_id', $cart->id);
            
        // if($cart->products()->wherePivot('product_id', $item_id)->amount > 1)
        // {
        //     $cart->products()->detach($product);        
        // }
        
        $cart->products()->detach($product);        
               
        $cart->push();
        
        return $cart;
    }

    public function addCartItem(Cart $cart, int $item_id,): Cart
    {  
        $product = Product::findOrFail($item_id);

        // dd($cart->products()->where('product_id', $product->id)->get());

        // foreach($cart->products()->where('product_id', $product->id)->get() as $prod)
        // {
        //     dump($prod->pivot->amount);
        // }

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
}
