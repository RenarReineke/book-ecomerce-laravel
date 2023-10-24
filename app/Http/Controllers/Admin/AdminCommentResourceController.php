<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;

class AdminCommentResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $commentable_type = request()->commentable_type;
        $commentable_id = request()->commentable_id;

        return view('admin.main.comments.commentCreateForm', compact('commentable_type', 'commentable_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, CommentService $commentService)
    {
        $owner = Auth::user();
        $commentService->store($request->validated(), $owner);

        return redirect()->route('rewiews.index');
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
    public function edit(Comment $comment)
    {
        $rewiew_id = request()->rewiew_id;

        return view('admin.main.comments.commentUpdateForm', compact(['comment', 'rewiew_id']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment, CommentService $commentService)
    {
        $user = $request->user();
        $updatedComment = $commentService->update($request->validated(), $user, $comment);

        return redirect()->route('rewiews.show', ['rewiew' => $comment->rewiew]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
