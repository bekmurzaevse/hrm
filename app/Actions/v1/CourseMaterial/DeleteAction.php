<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\DeleteDto;
use App\Exceptions\ApiResponseException;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, DeleteDto $dto): JsonResponse
    {
        try {
            $material = Course::findOrFail($dto->courseId)
                ->materials()
                ->where('id', $id)
                ->firstOrFail();

            $filePath = $material->path;    

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $material->delete();

            return static::toResponse(
                message: "$id - id li Course Material o'shirildi",
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Material Not Found', 404);
        }
    }
}