<?php

namespace App\Actions\v1\TestResult;

use App\Dto\v1\TestResult\CreateDto;
use App\Models\TestResult;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @param \App\Dto\v1\TestResult\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'test_id' => $dto->test_id,
            'user_id' => $dto->user_id,
            'score' => $dto->score,
            'taken_at' => $dto->taken_at,
        ];

        TestResult::create($data);

        return static::toResponse(
            message: 'Test Result jaratildi'
        );
    }
}