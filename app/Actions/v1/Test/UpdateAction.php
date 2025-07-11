<?php

namespace App\Actions\v1\Test;

use App\Dto\v1\Test\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Test\TestResource;
use App\Models\Test;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Test\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $test = Test::with('course')->findOrFail($id);

            $test->update([
                'title' => $dto->title ?? $test->title,
                'course_id' => $dto->courseId,
            ]);

            return static::toResponse(
                message: "$id - id li test jan'alandi",
                data: new TestResource($test)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Test Not Found', 404);
        }
    }
}