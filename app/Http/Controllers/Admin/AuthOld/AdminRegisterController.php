<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminRegisterController extends Controller
{
    public function create()
    {
        return view('registerForm');
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
