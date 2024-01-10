<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminUpdatePasswordRequest;
use App\Http\Requests\Admin\AdminUpdateProfileRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admin = Admin::find(1);

        if (!$admin) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        return response()->json([
            'admin' => $admin,
        ], 200);
    }

    public function updatePassword(AdminUpdatePasswordRequest $adminUpdatePasswordRequest, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        if(!Hash::check($adminUpdatePasswordRequest->current_password, $admin->password)) {
            return response()->json([
                'message' => 'invalid current password'
            ], 404);
        }

        if($adminUpdatePasswordRequest->new_password != $adminUpdatePasswordRequest->confirm_password) {
            return response()->json([
                'message' => 'password not match'
            ], 404);
        }

        $admin->update([
            'password' => Hash::make($adminUpdatePasswordRequest->new_password),
        ]);

        return response()->json([
            'message' => 'Password Updated',
        ], 200);
    }

    public function updateProfile(AdminUpdateProfileRequest $adminUpdateProfileRequest, $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'message' => 'admin not found',
            ], 404);
        }

        $admin->update([
            'name' => $adminUpdateProfileRequest->name,
            'email' => $adminUpdateProfileRequest->email,
        ]);

        return response()->json([
            'message' => 'Profile Updated'
        ], 200);
    }
}
