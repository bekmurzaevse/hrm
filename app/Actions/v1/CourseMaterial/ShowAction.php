<?php

namespace App\Actions\v1\CourseMaterial;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\CourseMaterial\CourseMaterialResource;
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
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'course_materials:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $material = Cache::remember($key, now()->addDay(), function () use ($id) {
                return CourseMaterial::with(['course'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new CourseMaterialResource($material)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('CourseMaterial Not Found', 404);
        }
    }
}