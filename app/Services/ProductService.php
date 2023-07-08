<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use App\DTO\ProductCreateDto;
use Illuminate\Support\Facades\DB;

final class ProductService
{
    public function store(ProductCreateDto $dto, Category $category) {
        DB::transaction(function () use($dto, $category) {
            $product = Product::create((array)$dto);
            $category->products()->save($product);
            return $product;
        });
    }
}
