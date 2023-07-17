<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Response;

class TagResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tags = Tag::get();
            return TagResource::collection($tags);
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        try {
            $tag = Tag::create(['title' => $request->getDto()->title]);
            return $tag;
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $tag = Tag::findOrFail($id);
            return new TagResource($tag);
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->update(['title' => $request->getDto()->title]);
            return $tag;
        } catch(\Throwable $e) {
            dump("Ошибка епта!");
            $rrr = response($e->getMessage(), 404);
            dump($e->getCode());
            dump($rrr);
            return $rrr;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Tag::destroy($id);
            return response()->noContent();
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }
}
