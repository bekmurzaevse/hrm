<?php

namespace App\Dto\v1\Report;

use App\Http\Requests\v1\Report\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public string $title,
        public string $type,
        public int $generatedBy,
        public UploadedFile $file,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Report\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            title: $request->get('title'),
            type: $request->get('type'),
            generatedBy: $request->get('generated_by'),
            file: $request->file('file')
        );
    }
}
