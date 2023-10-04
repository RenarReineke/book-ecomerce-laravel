<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
                'device_name' => 'required',
            ]);

            $client = Client::where('email', $request->email)->first();

            if (! $client || ! Hash::check($request->password, $client->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Указанный емайл не валидный'],
                ]);
            }

            $token = $client->createToken($request->device_name)->plainTextToken;

            return ['token' => $token];

        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        $request->client()->currentAccessToken()->delete();
    }
}
