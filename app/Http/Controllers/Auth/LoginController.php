<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\User\LoginUserRequest;

class LoginController extends Controller
{
    public function create()
    {
        return view('loginForm');
    }

    public function store(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        try {
            if(!Auth::attempt($credentials)) {
                if (!$request->expectsJson()) {
                    return back()->withInput()->withErrors([
                        'email' => trans('auth.failed')
                    ]);
                }

                return response([
                    'error' => 'Указаны неверные данные для входа'
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $request->session()->regenerate();

            if (!$request->expectsJson()) {
                return redirect()->intended(RouteServiceProvider::HOME);
            }

            return response($request->user(), Response::HTTP_CREATED);

        } catch(\Throwable $e) {
            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if (!$request->expectsJson()) {
            return redirect('/');
        }

        return response()->noContent();
    }
}
