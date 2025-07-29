<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\CourseMaterial\CourseMaterialResource;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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
            $material = Course::findOrFail($dto->courseId)->materials()->where('id', $id)->firstOrFail();

            $file = $dto->file;
            $filePath = $material->path;

            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $path = FileUploadHelper::file($file, 'course_material');

            Course::findOrFail($dto->courseId)->materials()->where('id', $id)->update([
                'name' => $dto->name,
                'path' => $path,
                'type' => 'course_material',
                'size' => $file->getSize(),
                'description' => $dto->description ?? null,
            ]);

            return static::toResponse(
                message: "$id - id li course material jan'alandi",
                data: new CourseMaterialResource($material)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Material Not Found', 404);
        }
    }
}