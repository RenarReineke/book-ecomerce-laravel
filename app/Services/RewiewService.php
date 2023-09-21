<?php

namespace App\Services;

use App\Models\User;
use ReflectionClass;
use App\Models\Rewiew;
use App\Models\Product;
use App\Enums\RatingEnum;

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

    public function update(array $request, User $user, Rewiew $rewiew): Rewiew
    {
        $rewiew->rating = $request['rating'];
        $rewiew->profit = $request['profit'];
        $rewiew->unprofit = $request['unprofit'];
        $rewiew->text = $request['text'];
        $rewiew->save();

        return $rewiew;
    }

    public function getDataForModalForm(): array
    {   
        $ratings = RatingEnum::class;
        $reflection = new ReflectionClass($ratings);
        $ratingList = $reflection->getConstants();

        $data = [
            'ratingList'
        ];

        return compact(...$data);
    }
}