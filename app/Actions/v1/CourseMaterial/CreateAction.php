<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\CreateDto;
use App\Models\CourseMaterial;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use function Symfony\Component\Clock\now;

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
        $data = [
            'course_id' => $dto->courseId,
            'file_url' => $dto->fileUrl,
            'type' => $dto->type,
            'uploaded_at' => now(),
        ];

        CourseMaterial::create($data);

        return static::toResponse(
            message: 'Kurs materiali jaratildi.',
        );
    }
}