<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\StorePublisherRequest;
use App\Http\Requests\Publisher\UpdatePublisherRequest;
use App\Models\Publisher;
use App\Services\PublisherService;

class AdminPublisherResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Publisher::class, 'publisher');
    }

    public function index()
    {
        $publishers = Publisher::paginate(6);

        return view('admin.main.publishers.publisherList', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.main.publishers.publisherCreateForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request, PublisherService $publisherService)
    {
        $publisher = $publisherService->store($request->validated());

        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('admin.main.publishers.publisherDetail', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('admin.main.publishers.publisherUpdateForm', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher, PublisherService $publisherService)
    {
        $publisher = $publisherService->update($request->validated(), $publisher);

        return redirect()->route('publishers.index', compact('publisher'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index');
    }
}
