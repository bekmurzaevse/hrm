<?php

namespace App\Actions\v1\Project;

use App\Exceptions\ApiResponseException;
use App\Models\Project;
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
            $project = Project::findOrFail($id);
            $project->delete();

            return static::toResponse(
                message: 'Project Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Project Not Found', 404);
        }
    }
}
