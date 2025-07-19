<?php

namespace App\Actions\v1\Tag;

use App\Exceptions\ApiResponseException;
use App\Models\Tag;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();

            return static::toResponse(
                message: 'Tag Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Tag Not Found', 404);
        }
    }
}
