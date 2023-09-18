<?php

namespace App\Services;

use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

final class PublisherService
{
    public function store(array $request): Publisher
    {
        return Publisher::create($request); 
    }

    public function update(array $request, $publisher): Publisher
    {
        $publisher->update($request);
        return $publisher; 
    }

    public function getDataForFrontendFilters(): array
    {   
        // Получить минимальное количество продуктов у автора
        $min = DB::select(
            'select min(product) as min from (
                select publishers.title as publisher, count(products.title) as product from publishers join series ON publishers.id = series.publisher_id join products ON series.id = products.series_id GROUP BY publishers.id
            ) as catp');

        $minCountProducts = $min[0]->min;
        

        // Получить максимальное количество продуктов у автора
        $max = DB::select(
            'select max(product) as max from (
                select publishers.title as publisher, count(products.title) as product from publishers join series ON publishers.id = series.publisher_id join products ON series.id = products.series_id GROUP BY publishers.id
            ) as catp');

        $maxCountProducts = $max[0]->max;
        
        // Получить среднее количество продуктов у автора
        $avg = DB::select(
            'select avg(product) as avg from (
                select publishers.title as publisher, count(products.title) as product from publishers join series ON publishers.id = series.publisher_id join products ON series.id = products.series_id GROUP BY publishers.id
            ) as catp');
        $avgCountProducts = round($avg[0]->avg);

        $data = [
            'minCountProducts', 'maxCountProducts', 'avgCountProducts'
        ];

        return compact(...$data);
    }
}