<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function createTestToken(Request $request): JsonResponse
    {
        $user = User::first();
        $token = $user->createToken('dev-token')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = $this->userService->store($data);

        return response()->json($user);
    }
}
