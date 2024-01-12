<?php

namespace App\Http\Controllers;

use App\models\User;
use App\Http\Requests\User\UserRegistrationRequest;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    public function __invoke(UserRegistrationRequest $storeUserRegistrationRequest) {

        User::create([
            'name' => $storeUserRegistrationRequest->name,
            'email' => $storeUserRegistrationRequest->email,
            'phone' => $storeUserRegistrationRequest->phone,
            'password' => Hash::make($storeUserRegistrationRequest->password),
        ]);

        return response()->json([
            'message' => 'successfull register',
        ], 201);
    }
}
