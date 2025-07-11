<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\CreateDto;
use App\Models\CourseMaterial;
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
        $material = CourseMaterial::create([
            'course_id' => $dto->course_id,
            'file_url' => $dto->file_url,
            'type' => $dto->type,
            'uploaded_at' => $dto->uploaded_at,
        ]);

        return static::toResponse(
            message: 'Kurs materiali jaratildi.',
        );
    }
}