<?php

namespace App\Dto\v1\Task;

use App\Http\Requests\v1\Task\UpdateRequest;

readonly class UpdateDto
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
     * @param \App\Http\Requests\v1\Task\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
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
