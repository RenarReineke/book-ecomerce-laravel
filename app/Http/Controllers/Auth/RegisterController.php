<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\User\RegisterUserRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.registerForm');
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            Auth::login($user);

            if (!$request->expectsJson()) {
                return redirect(RouteServiceProvider::HOME);
            }

            return response($user, Response::HTTP_CREATED);

        } catch(\Throwable $e) {
            if (!$request->expectsJson()) {
                return back()->withInput();
            }

            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Request $request)
    {

        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user->delete();

        return response()->noContent();
    }
}
