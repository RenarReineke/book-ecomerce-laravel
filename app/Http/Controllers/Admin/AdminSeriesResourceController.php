<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Series\StoreSeriesRequest;
use App\Http\Requests\Series\UpdateSeriesRequest;
use App\Models\Publisher;
use App\Models\Series;
use App\Services\SeriesService;

class AdminSeriesResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Series::class, 'series');
    }

    public function index()
    {
        $seriesList = Series::paginate(6);

        return view('admin.main.series.seriesList', compact('seriesList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();

        return view('admin.main.series.seriesCreateForm', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeriesRequest $request, SeriesService $seriesService)
    {
        // dd($request);
        $series = $seriesService->store($request->validated());

        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        return view('admin.main.series.seriesDetail', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        return view('admin.main.series.seriesUpdateForm', compact('series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesRequest $request, Series $series, SeriesService $seriesService)
    {
        $series = $seriesService->update($request->validated(), $series);

        return redirect()->route('series.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index');
    }
}
