<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __invoke(LoginRequest $loginRequest)
    {
        $admin = Admin::where([
            'name' => $loginRequest->name
        ])->first();

        if (!$admin || !Hash::check($loginRequest->password, $admin->password)) {
            return response()->json([
                'message' => 'invalid email or password'
            ], 200);
        }

        $token = $admin->createToken('Authentication')->plainTextToken;

        return response()->json([
            'message' => 'successfully login',
            'token' => $token
        ], 200);
    }
}
