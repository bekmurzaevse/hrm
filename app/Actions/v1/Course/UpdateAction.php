<?php

namespace App\Actions\v1\Course;

use App\Dto\v1\Course\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Course\CourseResource;
use App\Models\Course;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Course\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $course = Course::with(['createdBy'])->findOrFail($id);
            $course->update([
                'title' => $dto->title,
                'description' => $dto->description ?? $course->description,
                'created_by' => $dto->createdBy,
            ]);

            return static::toResponse(
                message: "$id - id li course janalandi",
                data: new CourseResource($course)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Not Found', 404);
        }
    }
}