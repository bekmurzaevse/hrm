<?php

namespace App\Actions\v1\Project;

use App\Dto\v1\Project\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Project\ProjectResource;
use App\Models\Project;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Project\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $project = Project::with(['createdBy'])->findOrFail($id);
            $project->update([
                'title' => $dto->title,
                'budget' => $dto->budget,
                'status' => $dto->status ?? $project->status,
                'deadline' => $dto->deadline ?? $project->deadline,
                'created_by' => $dto->createdBy,
            ]);

            return static::toResponse(
                message: 'Project Updated',
                data: new ProjectResource($project)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Project Not Found', 404);
        }
    }
}
