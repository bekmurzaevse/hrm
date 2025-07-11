<?php

namespace App\Dto\v1\Task;

use App\Http\Requests\v1\Task\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public int $assignedToId,
        public string $title,
        public string $description,
        public string $dueDate,
        public string $status,
        public int $createdById,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Task\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            assignedToId: $request->get('assigned_to_id'),
            title: $request->get('title'),
            description: $request->get('description'),
            dueDate: $request->get('due_date'),
            status: $request->get('status'),
            createdById: $request->get('created_by_id'),
        );
    }
}
