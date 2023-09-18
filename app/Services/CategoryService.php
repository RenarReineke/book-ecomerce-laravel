<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

final class CategoryService
{
    public function store(array $request): Category
    {
        return Category::create($request); 
    }

    public function update(array $request, Category $category): Category
    {
        $category->update($request);
        return $category;
    }

    public function getDataForFrontendFilters(): array
    {   
        // Получить минимальное количество продуктов у автора
        $min = DB::select(
            'select min(product) as min from (
                select categories.title as category, count(products.title) as product from categories join products ON categories.id = products.category_id GROUP BY categories.id
            ) as catp');

        $minCountProducts = $min[0]->min;
        

        // Получить максимальное количество продуктов у автора
        $max = DB::select(
            'select max(product) as max from (
                select categories.title as category, count(products.title) as product from categories join products ON categories.id = products.category_id GROUP BY categories.id
            ) as catp');

        $maxCountProducts = $max[0]->max;
        
        // Получить среднее количество продуктов у автора
        $avg = DB::select(
            'select avg(product) as avg from (
                select categories.title as category, count(products.title) as product from categories join products ON categories.id = products.category_id GROUP BY categories.id
            ) as catp');
        $avgCountProducts = round($avg[0]->avg);

        $data = [
            'minCountProducts', 'maxCountProducts', 'avgCountProducts'
        ];

        return compact(...$data);
    }
}