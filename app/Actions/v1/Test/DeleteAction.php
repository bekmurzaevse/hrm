<?php

namespace App\Actions\v1\Test;

use App\Exceptions\ApiResponseException;
use App\Models\Test;
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
            $test = Test::findOrFail($id);
            $test->delete();

            return static::toResponse(
                message: "$id - id li Test o'shirildi",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Not Found', 404);
        }
    }
}