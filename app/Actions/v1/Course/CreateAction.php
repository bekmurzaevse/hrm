<?php

namespace App\Actions\v1\Course;

use App\Dto\v1\Course\CreateDto;
use App\Models\Course;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Course\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'description' => $dto->description ?? null,
            'created_by' => $dto->createdBy,
        ];

        Course::create($data);

        return static::toResponse(
            message: 'Course created'
        );
    }
}