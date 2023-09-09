<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use App\Models\Rewiew;

final class RewiewService
{
    public function store(array $request, User $user): Rewiew
    {
        $rewiew = new Rewiew();
        $rewiew->rating = $request['rating'];
        $rewiew->profit = $request['profit'];
        $rewiew->unprofit = $request['unprofit'];
        $rewiew->text = $request['text'];

        $product = Product::findOrFail($request['product_id']);
        $rewiew->product()->associate($product);
        $rewiew->user()->associate($user);
        $rewiew->push();

        return $rewiew;
    }
}