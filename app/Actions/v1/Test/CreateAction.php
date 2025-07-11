<?php

namespace App\Actions\v1\Test;

use App\Dto\v1\Test\CreateDto;
use App\Models\Test;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $test = Test::create([
            'title' => $dto->title,
            'course_id' => $dto->courseId,
        ]);

        return static::toResponse(
            message: 'Test jaratildi.',
        );
    }
}