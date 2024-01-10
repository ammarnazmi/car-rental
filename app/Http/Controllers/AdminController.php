<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminUpdatePasswordRequest;
use App\Http\Requests\Admin\AdminUpdateProfileRequest;
use App\Models\Admin;

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
            'message' => 'successfull update admin'
        ], 200);
    }
}
