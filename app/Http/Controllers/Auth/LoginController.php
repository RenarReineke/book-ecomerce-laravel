<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginUserRequest;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function create()
    {
        return view('loginForm');
    }

    public function store(LoginUserRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withInput()->withErrors([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
