<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;

class AdminTagResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(6);
        return view('admin.main.tags.tagList', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.main.tags.tagCreateForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request, TagService $tagService)
    {
        $tag = $tagService->store($request->validated());
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.main.tags.tagUpdateForm', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {   
        return view('admin.main.tags.tagUpdateForm', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag, TagService $tagService)
    {
        $tag = $tagService->update($request->validated(), $tag);
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
