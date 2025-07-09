<?php

namespace App\Actions\v1\Vacancy;

use App\Dto\v1\Vacancy\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Vacancy\VacancyResource;
use App\Models\Vacancy;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Vacancy\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $vacancy = Vacancy::with(['recruiter', 'project'])->findOrFail($id);
            $vacancy->update([
                'title' => $dto->title,
                'requirements' => $dto->requirements,
                'salary' => $dto->salary ?? $vacancy->salary,
                'deadline' => $dto->deadline ?? $vacancy->deadline,
                'recruiter_id' => $dto->recruiterId,
                'project_id' => $dto->projectId ?? $vacancy->project_id,
                'status' => $dto->status ?? $vacancy->status,
                'description' => $dto->description ?? $vacancy->description,
            ]);

            return static::toResponse(
                message: 'Vacancy Updated',
                data: new VacancyResource($vacancy)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Vacancy Not Found', 404);
        }
    }
}
