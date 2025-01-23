<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'the provided credentials are incorrect'
            ])->setStatusCode(404);
        }

        // $token = $user->createToken($user->name, $user->role == "instructor" ? ["course:modfiy"] : [""], now()->addWeek())->plainTextToken;
        $token = $user->createToken($user->name, $user->role == "instructor" ? ['course:update'] : [""],  now()->addWeek())->plainTextToken;

        return ApiResponse::ok([
            'user' => new UserResource($user),
            'token' => $token
        ],);
    }

    function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return ApiResponse::ok();
    }
}
