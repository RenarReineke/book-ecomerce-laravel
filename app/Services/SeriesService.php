<?php

namespace App\Services;

use App\Models\Series;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

final class SeriesService
{
    public function store(array $request): Series
    {
        $series = Series::create($request);
        return $series; 
    }

    public function update(array $request, Series $series): Series
    {
        $series->update($request);
        return $series; 
    }

    public function getDataForFrontendFilters(): array
    {   
        // Получить минимальное количество продуктов у автора
        $min = DB::select(
            'select min(product) as min from (
                select series.title as series, count(products.title) as product from series join products ON series.id = products.series_id GROUP BY series.id
            ) as catp');

        $minCountProducts = $min[0]->min;
        

        // Получить максимальное количество продуктов у автора
        $max = DB::select(
            'select max(product) as max from (
                select series.title as series, count(products.title) as product from series join products ON series.id = products.series_id GROUP BY series.id
            ) as catp');

        $maxCountProducts = $max[0]->max;
        
        // Получить среднее количество продуктов у автора
        $avg = DB::select(
            'select avg(product) as avg from (
                select series.title as series, count(products.title) as product from series join products ON series.id = products.series_id GROUP BY series.id
            ) as catp');
        $avgCountProducts = round($avg[0]->avg);

        $data = [
            'minCountProducts', 'maxCountProducts', 'avgCountProducts'
        ];

        return compact(...$data);
    }
}