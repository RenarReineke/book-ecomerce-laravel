<?php

namespace App\Http\Controllers\Api;

use App\Models\Publisher;
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
    public function store(StorePublisherRequest $request)
    {
        return Publisher::create($request->validated());
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
    public function update(UpdatePublisherRequest $request, string $id)
    {
         $publisher = Publisher::findOrFail($id);
         $publisher->update($request->validated());
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
