<?php

namespace App\Services;

use App\Enums\RatingEnum;
use App\Models\Client;
use App\Models\Product;
use App\Models\Rewiew;
use ReflectionClass;

final class RewiewService
{
    public function store(array $request, Client $client): Rewiew
    {
        $rewiew = new Rewiew();
        $rewiew->rating = $request['rating'];
        $rewiew->profit = $request['profit'];
        $rewiew->unprofit = $request['unprofit'];
        $rewiew->text = $request['text'];

        $product = Product::findOrFail($request['product_id']);
        $rewiew->product()->associate($product);
        $rewiew->client()->associate($client);
        $rewiew->push();

        return $rewiew;
    }

    public function update(array $request, Client $client, Rewiew $rewiew): Rewiew
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
            'ratingList',
        ];

        return compact(...$data);
    }
}
