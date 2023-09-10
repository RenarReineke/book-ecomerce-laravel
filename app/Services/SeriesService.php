<?php

namespace App\Services;

use App\Models\Publisher;
use App\Models\Series;

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
}