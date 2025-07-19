<?php

namespace App\Actions\v1\Tag;

use App\Dto\v1\Tag\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Tag\TagResource;
use App\Models\Tag;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Tag\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->update([
                'name' => $dto->name,
            ]);

            return static::toResponse(
                message: 'Tag Updated',
                data: new TagResource($tag)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Tag Not Found', 404);
        }
    }
}
