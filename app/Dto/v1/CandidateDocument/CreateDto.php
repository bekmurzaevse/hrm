<?php

namespace App\Dto\v1\CandidateDocument;

use App\Http\Requests\v1\CandidateDocument\CreateRequest;
use Illuminate\Http\UploadedFile;


readonly class CreateDto
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public int $candidateId,
        public UploadedFile $file
    ) {}

    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
            candidateId: $request->get('candidate_id'),
            file: $request->file('file')
        );
    }
}