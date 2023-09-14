<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;

class CartResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cart::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $cart = new Cart();

        $user = User::findOrFail(1);
        $cart->user()->associate($user);

        $cart->save();

        foreach($request->products as $product_item) 
        {
            $product = Product::findOrFail($product_item['id']);
            
            $cart->products()->attach($product, ['amount' => $product_item['amount']]);
        }
        
        $cart->push();
        
        return $cart;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new CartResource(Cart::findOrFail($id));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   
        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);

        $product_id = $request->validated()['product_id'];

        $updatedCart = $cartService->removeCartItem($cart, $product_id);
        
        return $updatedCart;
    }

    public function updateCartItem(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   

        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        
        $updatedCart = $cartService->addCartItem($cart, $product_id);
        
        return $updatedCart;
    }

    public function increase(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   

        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        
        $updatedCart = $cartService->increaseAmount($cart, $product_id);
        
        return $updatedCart;
    }

    public function decrease(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   

        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        
        $updatedCart = $cartService->decreaseAmount($cart, $product_id);
        
        return $updatedCart;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart = Cart::find($cart);
        $cart->delete();
        return response()->noContent();
    }
}
