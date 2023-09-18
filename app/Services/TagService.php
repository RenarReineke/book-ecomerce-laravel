<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

final class TagService
{
    public function store(array $request): Tag
    {
        return Tag::create($request); 
    }

    public function update(array $request, Tag $tag): Tag
    {
        $tag->update($request);
        return $tag;
    }

    public function getDataForFrontendFilters(): array
    {   
        // Получить минимальное количество продуктов у автора
        $min = DB::select(
            'select min(product) as min from (
                select tags.title as tag, count(product_tag.id) as product from tags join product_tag ON tags.id = product_tag.tag_id GROUP BY tags.id
            ) as catp');

        $minCountProducts = $min[0]->min;
        

        // Получить максимальное количество продуктов у автора
        $max = DB::select(
            'select max(product) as max from (
                select tags.title as tag, count(product_tag.id) as product from tags join product_tag ON tags.id = product_tag.tag_id GROUP BY tags.id
            ) as catp');

        $maxCountProducts = $max[0]->max;
        
        // Получить среднее количество продуктов у автора
        $avg = DB::select(
            'select avg(product) as avg from (
                select tags.title as tag, count(product_tag.id) as product from tags join product_tag ON tags.id = product_tag.tag_id GROUP BY tags.id
            ) as catp');
        $avgCountProducts = round($avg[0]->avg);

        $data = [
            'minCountProducts', 'maxCountProducts', 'avgCountProducts'
        ];

        return compact(...$data);
    }
}