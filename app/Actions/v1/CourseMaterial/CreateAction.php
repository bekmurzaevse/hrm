<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Course;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\CourseMaterial\CreateDto $dto
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $file = $dto->file;
        $path = FileUploadHelper::file($file, 'course_material');

        Course::findOrFail($dto->courseId)->materials()->create([
            'name' => $dto->name,
            'path' => $path,
            'type' => 'course_material',
            'size' => $file->getSize(),
            'description' => $dto->description ?? null,
        ]);

        return static::toResponse(
            message: 'Course Material Created'
        );
    }
}