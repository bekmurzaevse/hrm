<?php

namespace App\Dto\v1\Report;

use App\Http\Requests\v1\Report\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
{
    public function __construct(
        public string $title,
        public string $type,
        public int $generatedBy,
        public UploadedFile $file,
        public string $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Report\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            type: $request->get('type'),
            generatedBy: $request->get('generated_by'),
            file: $request->file('file'),
            description: $request->get('description'),
        );
    }
}
