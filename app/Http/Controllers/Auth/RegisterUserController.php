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

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            Auth::login($user);

            return response($user, Response::HTTP_CREATED);
        } catch(\Throwable $e) {
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
