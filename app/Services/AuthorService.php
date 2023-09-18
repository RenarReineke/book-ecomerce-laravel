<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Support\Facades\DB;

final class AuthorService
{
    public function store(array $request): Author
    {
        return Author::create($request); 
    }

    public function update(array $request, Author $author): Author
    {
        $author->update($request);
        return $author;
    }

    public function getDataForFrontendFilters(): array
    {   
        // Получить минимальное количество продуктов у автора
        $min = DB::select(
            'select min(product) as min from (
                select authors.name as author, count(author_product.id) as product from authors join author_product ON authors.id = author_product.author_id GROUP BY authors.id
            ) as catp');

        $minCountProducts = $min[0]->min;
        

        // Получить максимальное количество продуктов у автора
        $max = DB::select(
            'select max(product) as max from (
                select authors.name as author, count(author_product.id) as product from authors join author_product ON authors.id = author_product.author_id GROUP BY authors.id
            ) as catp');

        $maxCountProducts = $max[0]->max;
        
        // Получить среднее количество продуктов у автора
        $avg = DB::select(
            'select avg(product) as avg from (
                select authors.name as author, count(author_product.id) as product from authors join author_product ON authors.id = author_product.author_id GROUP BY authors.id
            ) as catp');
        $avgCountProducts = round($avg[0]->avg);

        $data = [
            'minCountProducts', 'maxCountProducts', 'avgCountProducts'
        ];

        return compact(...$data);
    }
}