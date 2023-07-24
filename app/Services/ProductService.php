<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

final class ProductService
{
    public function store(array $request, Category $category): Product
    {
        $product = DB::transaction(function () use ($request, $category) {
            $product = Product::create($request);
            $category->products()->save($product);
            return $product;
        });

        return $product;
    }
}
