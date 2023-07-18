<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Throwable;

class TagResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::get();
        return TagResource::collection($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag = Tag::create(['title' => $request->getDto()->title]);
        return $tag;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $tag = Tag::findOrFail($id);
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['title' => $request->getDto()->title]);
        return $tag;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tag::destroy($id);
        return response()->noContent();
    }
}
