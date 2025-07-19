<?php

namespace App\Actions\v1\CourseMaterial;

use App\Dto\v1\CourseMaterial\ShowDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CourseMaterial\CourseMaterialResource;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, ShowDto $dto): JsonResponse
    {
        try {
            $key = 'course_materials:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $material = Cache::remember($key, now()->addDay(), function () use ($id, $dto) {
                return Course::findOrFail($dto->courseId)->materials()->where('id', $id,)->firstOrFail();
            });
            
            return static::toResponse(
                message: 'Course Material alindi',
                data: new CourseMaterialResource($material)
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Course Material Not Found', 404);
        }
    }
}