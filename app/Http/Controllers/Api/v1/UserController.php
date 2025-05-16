<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\UserTag\AttachUserTagRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->userService->all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->json($this->userService->findById($id));
    }

    public function store(CreateUserRequest $request): JsonResponse
    {
        return response()->json($this->userService->store($request->validated()));
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        return response()->json($this->userService->update($request->validated(), $id));
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->userService->destroy($id));
    }

    public function attachTags(AttachUserTagRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->findById($id);
        $user->tags()->syncWithoutDetaching($request->input('tag_id'));

        return response()->json([
            $user->fresh('tags'),
        ]);
    }

    public function detachTag(int $id, int $tag_id): JsonResponse
    {
        $user = $this->userService->findById($id);

        $user->tags()->detach($tag_id);

        return response()->json([
            $user->fresh('tags'),
        ]);
    }
}
