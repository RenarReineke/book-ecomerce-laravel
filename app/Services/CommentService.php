<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Comment;
use App\Models\User;

final class CommentService
{
    public function store(array $request, User|Client $owner)
    {
        $comment = new Comment();
        $comment->message = $request['message'];

        $commentable = $request['commentable_type']::findOrFail($request['commentable_id']);
        $comment->commentable()->associate($commentable);

        $comment->owner()->associate($owner);
        $comment->push();

        return $comment;
    }

    public function update(array $request, Comment $comment)
    {
        $comment->message = $request['message'];
        $comment->save();

        return $comment;
    }
}
