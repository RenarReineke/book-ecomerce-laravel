<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Rewiew;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $user = Auth::user() ?? User::findOrFail($request->user_id);
        $rewiew = Rewiew::findOrFail($request->rewiew_id);

        $like = Like::where([
            'user_id' => $user->id,
            'rewiew_id' => $rewiew->id,
        ])->first();

        if ($like && $like->isPositive == $request->isPositive) {
            $like->delete();

            return response()->noContent();
        }

        if ($like) {
            $like->update(['isPositive' => $request->isPositive]);

            return $like;
        }

        return Like::create([
            'user_id' => $user->id,
            'rewiew_id' => $rewiew->id,
            'isPositive' => $request->isPositive,
        ]);
    }

    public function dislike(Request $request)
    {
        $user = Auth::user() ?? User::findOrFail($request->user_id);
        $rewiew = Rewiew::findOrFail($request->rewiew_id);

        $like = Like::updateOrCreate(
            [
                'user_id' => $user->id,
                'rewiew_id' => $rewiew->id,
            ],
            [
                'isPositive' => false,
            ]
        );

        return $like;
    }
}
