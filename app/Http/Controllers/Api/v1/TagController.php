<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Services\TagService;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    public function __construct(private TagService $tagService)
    {
    }

    public function store(CreateTagRequest $request): JsonResponse
    {
        return response()->json($this->tagService->store($request->validated()));
    }

    public function update(UpdateTagRequest $request, int $id): JsonResponse
    {
        return response()->json($this->tagService->update($request->validated(), $id));
    }

    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->tagService->destroy($id));
    }
}
