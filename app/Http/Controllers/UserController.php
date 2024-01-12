<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\UpdateProfileUserRequest;
use App\Http\Requests\User\UpdatePasswordUserRequest;
use Illuminate\Support\Facades\Hash;

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

    public function updateProfile(UpdateProfileUserRequest $updateProfileUserRequest, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found',
            ], 404);
        }

        $user->update([
            'name' => $updateProfileUserRequest->name,
            'email' => $updateProfileUserRequest->email,
            'phone' => $updateProfileUserRequest->phone,
        ]);

        return response()->json([
            'message' => 'Profile Updated'
        ], 200);
    }

    public function updatePassword(UpdatePasswordUserRequest $updatePasswordUserRequest, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        if(!Hash::check($updatePasswordUserRequest->current_password, $user->password)) {
            return response()->json([
                'message' => 'invalid current password'
            ], 404);
        }

        if($updatePasswordUserRequest->new_password != $updatePasswordUserRequest->confirm_password) {
            return response()->json([
                'message' => 'password not match'
            ], 404);
        }

        $user->update([
            'password' => Hash::make($updatePasswordUserRequest->new_password),
        ]);

        return response()->json([
            'message' => 'Password Updated',
        ], 200);
    }
}
