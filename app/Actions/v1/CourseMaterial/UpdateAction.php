<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CourseMaterial\CourseMaterialResource;
use App\Models\CourseMaterial;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\CourseMaterial\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $material = CourseMaterial::with('course')->findOrFail($id);

            $material->update([
                'course_id' => $dto->course_id,
                'file_url' => $dto->file_url ?? $material->file_url,
                'type' => $dto->type ?? $material->type,
                'uploaded_at' => $dto->uploaded_at ?? $material->uploaded_at,
            ]);

            return static::toResponse(
                message: "$id - id li course material jan'alandi",
                data: new CourseMaterialResource($material)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('CourseMaterial Not Found', 404);
        }
    }
}