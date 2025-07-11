<?php

namespace App\Actions\v1\CourseMaterial;

use App\Exceptions\ApiResponseException;
use App\Models\CourseMaterial;
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
            $material = CourseMaterial::findOrFail($id);
            $material->delete();

            return static::toResponse(
                message: "$id - id li Course Material o'shirildi",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Material Not Found', 404);
        }
    }
}