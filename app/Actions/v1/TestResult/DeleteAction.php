<?php

namespace App\Actions\v1\TestResult;

use App\Exceptions\ApiResponseException;
use App\Models\TestResult;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $result = TestResult::findOrFail($id);
            $result->delete();

            return static::toResponse(
                message: "$id - id li Test Result o'shirildi",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Result Not Found', 404);
        }
    }
}