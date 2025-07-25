<?php

namespace App\Dto\v1\Vacancy;

use App\Http\Requests\v1\Vacancy\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public string $title,
        public string $requirements,
        public ?float $salary,
        public ?string $deadline,
        public int $recruiterId,
        public ?int $projectId,
        public ?string $status,
        public ?string $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Vacancy\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->title,
            requirements: $request->requirements,
            salary: $request->salary,
            deadline: $request->deadline,
            recruiterId: $request->recruiter_id,
            projectId: $request->project_id,
            status: $request->status,
            description: $request->description
        );
    }
}
