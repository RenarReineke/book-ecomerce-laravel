<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;

class AdminCommentResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $rewiew_id = request()->rewiew_id;
        return view('admin.main.comments.commentCreateForm', compact('rewiew_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, CommentService $commentService)
    {
        $user = $request->user();
        $comment = $commentService->store($request->validated(), $user);
        return redirect()->route('rewiews.show', ['rewiew' => $comment->rewiew]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.main.comments.commentDetail', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
