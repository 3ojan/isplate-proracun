<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        // Log::info($credentials);
        // $request->session()->put('key', 'value');

        if (!Auth::attempt($credentials)) {
            return response(['message' => 'Krivo korsničko ime i/ili lozinka.'], 422);
        }
        /** @var User $user */
        $user = Auth::user();
        Log::info($user);
        $token = $user->createToken('main')->plainTextToken;
        $expiration = config('sanctum.expiration');

        // Log::info($request->session()->all());

        return response(compact('user', 'token', 'expiration'), 201);
    }
    public function logout(Request $request)
    {
        // /** @var User $user */
        Log::info($request);

        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }

    //TODO: stao na 1:31:00
    // public function Register(RegisterRequest $request)
    // {
    //     $data = $request->validated();
    //     /** @var \App\Models\User $user */
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);

    //     $token = $user->createToken('main')->plainTextToken;

    //     return response(compact('user', 'token'));
    // }
}
