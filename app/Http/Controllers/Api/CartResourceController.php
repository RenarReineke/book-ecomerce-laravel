<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Services\CartService;

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
    public function store(StoreCartRequest $request, CartService $cartService)
    {
        $cart = $cartService->create($request->getDto());

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
        return $cartService->removeCartItem($request->getDto(), $cart);
    }

    public function updateCartItem(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {
        return $cartService->addCartItem($request->getDto(), $cart);
    }

    public function increase(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {
        return $cartService->increaseAmount($request->getDto(), $cart);
    }

    public function decrease(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {
        return $cartService->decreaseAmount($request->getDto(), $cart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->noContent();
    }
}
