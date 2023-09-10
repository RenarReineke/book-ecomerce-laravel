<?php

namespace App\Services;

use App\Models\User;
use App\Models\Rewiew;
use App\Models\Comment;

final class CommentService
{
    public function store(array $request, User $user)
    {
        $comment = new Comment();
        $comment->message = $request['message'];

        $rewiew = Rewiew::findOrFail($request['rewiew_id']);
        $comment->rewiew()->associate($rewiew);

        $comment->user()->associate($user);
        $comment->push();

        return $comment;
    }

    public function update(array $request, User $user, Comment $comment)
    {
        $comment->message = $request['message'];
        $comment->save();

        return $comment;
    }
}