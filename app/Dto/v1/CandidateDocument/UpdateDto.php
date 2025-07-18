<?php

namespace App\Dto\v1\CandidateDocument;

use App\Http\Requests\v1\CandidateDocument\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public int $candidateId,
        public UploadedFile $file
    ) {}

    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            candidateId: $request->get('candidate_id'),
            file: $request->file('file')
        );
    }
}