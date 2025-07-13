<?php

namespace App\Actions\v1\TestResult;

use App\Dto\v1\TestResult\CreateDto;
use App\Models\TestResult;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use function Symfony\Component\Clock\now;

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
            'test_id' => $dto->testId,
            'user_id' => $dto->userId,
            'score' => $dto->score,
            'taken_at' => now(),
        ];

        TestResult::create($data);

        return static::toResponse(
            message: 'Test Result jaratildi'
        );
    }
}