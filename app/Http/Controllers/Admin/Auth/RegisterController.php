<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.registerForm');
    }

    public function store(RegisterUserRequest $request)
    {

        dd('ты попал на контроллер админки каким то чудом....');
        try {
            $user = User::create($request->validated());

            Auth::login($user);

            if (! $request->expectsJson()) {
                return redirect(RouteServiceProvider::HOME);
            }

            return response($user, Response::HTTP_CREATED);

        } catch (\Throwable $e) {
            if (! $request->expectsJson()) {
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
