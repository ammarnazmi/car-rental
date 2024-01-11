<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\UserLoginRequest;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function __invoke(UserLoginRequest $userLoginRequest)
    {
        $user = User::where([
            'email' => $userLoginRequest->email
        ])->first();

        if (!$user || !Hash::check($userLoginRequest->password, $user->password)) {
            return response()->json([
                'message' => 'invalid email or password'
            ], 404);
        }

        $token = $user->createToken('Authentication')->plainTextToken;

        return response()->json([
            'message' => 'successfully login',
            'token' => $token,
        ], 200);
    }
}
