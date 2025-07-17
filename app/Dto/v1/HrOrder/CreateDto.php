<?php

namespace App\Dto\v1\HrOrder;

use App\Http\Requests\v1\HrOrder\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public ?string $name,
        public int $userId,
        public ?string $description,
        public UploadedFile $file
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrOrder\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            userId: $request->get('user_id'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
