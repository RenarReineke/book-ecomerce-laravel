<?php

namespace App\Http\Controllers\Api;

use App\Models\Publisher;
use App\Services\PublisherService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherResource;
use App\Http\Requests\Publisher\StorePublisherRequest;
use App\Http\Requests\Publisher\UpdatePublisherRequest;

class PublisherResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $publishers = Publisher::paginate(10);
        return PublisherResource::collection( $publishers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request, PublisherService $publisherService)
    {
        $publisher = $publisherService->store($request->validated());
        return $publisher;
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return new PublisherResource( $publisher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher, PublisherService $publisherService)
    {
        $publisher = $publisherService->update($request->validated(), $publisher);
        return  $publisher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
         $publisher->delete();
        return response()->noContent();
    }
}
