<?php

namespace App\Services;

use App\Models\Publisher;

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
}