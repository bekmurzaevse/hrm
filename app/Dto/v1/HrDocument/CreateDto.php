<?php

namespace App\Dto\v1\HrDocument;

use App\Http\Requests\v1\HrDocument\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public UploadedFile $file
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\HrDocument\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            file: $request->file('file')
        );
    }
}
