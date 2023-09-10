<?php

namespace App\Http\Controllers;

use App\Http\Requests\Series\StoreSeriesRequest;
use App\Http\Requests\Series\UpdateSeriesRequest;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Resources\SeriesResource;

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
    public function store(StoreSeriesRequest $request)
    {
        return Series::create($request->validated());
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
    public function update(UpdateSeriesRequest $request, string $id)
    {
        $series = Series::findOrFail($id);
        $series->update($request->validated());
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
