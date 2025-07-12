<?php

namespace App\Actions\v1\TestResult;

use App\Dto\v1\TestResult\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\TestResult\TestResultResource;
use App\Models\TestResult;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\TestResult\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $result = TestResult::with('test', 'course')->findOrFail($id);

            $result->update([
                'test_id' => $dto->test_id ?? $result->test_id,
                'user_id' => $dto->user_id ?? $result->user_id,
                'score' => $dto->score,
                'taken_at' => $dto->taken_at ?? $result->taken_at,
            ]);

            return static::toResponse(
                message: "$id - id li test result jan'alandi",
                data: new TestResultResource($result)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Result Not Found', 404);
        }
    }
}