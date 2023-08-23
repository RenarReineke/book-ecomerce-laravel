<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PersonalAccessTokenController extends Controller
{
    public function store(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if(!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Указанный емайл не валидный']
                ]);
            }

            $token = $user->createToken($request->device_name)->plainTextToken;
            return ['token' => $token];

        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
