<?php

namespace App\Dto\v1\HrOrder;

use App\Http\Requests\v1\HrOrder\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public ?UploadedFile $file
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrOrder\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
