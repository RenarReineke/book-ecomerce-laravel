<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\UpdateCartRequest;

class AdminCartResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::paginate();
        return view('admin.main.carts.cartList', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cart = Cart::findOrFail($id);
        return view('admin.main.carts.cartDetail', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('Test');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('admin/carts');
    }

    public function remove(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {
        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);

        $product_id = $request->validated()['product_id'];

        $cartService->removeCartItem($cart, $product_id);
        
        return back();
    }

    public function increase(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   
        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        
        $cartService->increaseAmount($cart, $product_id);
        
        return back();
    }

    public function decrease(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   

        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        
        $cartService->decreaseAmount($cart, $product_id);
        
        return back();
    }

    public function change(UpdateCartRequest $request, Cart $cart, CartService $cartService)
    {   

        // Имитирует юзера, который должен браться из запроса
        $user = User::findOrFail(1);
        // Получить конкретное значение из отвалидированного массива
        $product_id = $request->validated()['product_id'];
        $amount = $request->validated()['amount'];
        
        $cartService->changeAmount($cart, $product_id, $amount);
        
        return back();
    }
}
