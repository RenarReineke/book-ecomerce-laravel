<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Auth::login(User::find(1));
        $user = $request->user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->save();

        $cart = $user->carts->first();

        foreach($cart->products as $product) {
            $orderItem = new OrderProduct();
            $orderItem->product_id = $product['id'];
            $orderItem->amount = $product['amount'];
            $orderItem->order_id = $order->id;
            $orderItem->save();
        }

        return $order;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
