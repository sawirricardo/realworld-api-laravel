<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @group User Management
 */
class SanctumTokenController extends Controller
{
    /**
     * Login
     *
     * @bodyParam email string required The user email
     * @bodyParam password string required The user password
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @unauthenticated
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', request()->input('email'))->first();

        if (!$user || !Hash::check(request()->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken($user->id)->plainTextToken
        ]);
    }
}
