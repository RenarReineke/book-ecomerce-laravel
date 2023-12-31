<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use App\Services\SeriesService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeriesResource;
use App\Http\Requests\Series\StoreSeriesRequest;
use App\Http\Requests\Series\UpdateSeriesRequest;

class SeriesResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seriess = Series::paginate(10);
        return SeriesResource::collection($seriess);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeriesRequest $request, SeriesService $seriesService)
    {   $series = $seriesService->store($request->validated());
        return $series;
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        return new SeriesResource($series);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesRequest $request, Series $series, SeriesService $seriesService)
    {
        $series = $seriesService->update($request->validated(), $series);
        return $series;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        $series->delete();
        return response()->noContent();
    }
}
