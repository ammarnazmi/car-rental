<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->user()->id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }

        return response()->json([
            'user' => $user,
        ], 200);
    }
}
