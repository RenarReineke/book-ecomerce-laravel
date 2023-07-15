<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        try {
            $user = User::create($credentials);

            if(Auth::attempt($credentials)) {
                return response($request->user(), Response::HTTP_CREATED);
            }

            return response([
                'error' => 'Переданные данные не соответствуют записям в БД'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }
}
