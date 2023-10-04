<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RegisterClientRequest;
use App\Models\Client;
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

    public function store(RegisterClientRequest $request)
    {
        try {
            $client = Client::create($request->validated());

            Auth::login($client);

            if (! $request->expectsJson()) {
                return redirect(RouteServiceProvider::HOME);
            }

            return response($client, Response::HTTP_CREATED);

        } catch (\Throwable $e) {
            if (! $request->expectsJson()) {
                return back()->withInput();
            }

            return response($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Request $request)
    {

        $client = $request->client();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $client->delete();

        return response()->noContent();
    }
}
