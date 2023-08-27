<?php

namespace App\Http\Controllers;

use App\Models\Rewiew;
use App\Http\Requests\Rewiew\CreateRewiewRequest;
use App\Http\Requests\Rewiew\UpdateRewiewRequest;
use App\Http\Resources\RewiewResource;

class RewiewResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RewiewResource::collection(Rewiew::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRewiewRequest $request)
    {
        return new RewiewResource(Rewiew::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rewiew $rewiew)
    {
        return new RewiewResource($rewiew);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRewiewRequest $request, Rewiew $rewiew)
    {
        $rewiew->update($request->validated());
        return new RewiewResource($rewiew);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rewiew $rewiew)
    {
        $rewiew->delete();
        return response()->noContent();
    }
}
