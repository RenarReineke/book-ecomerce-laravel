<?php

namespace App\Services;

use App\Models\Category;

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
}