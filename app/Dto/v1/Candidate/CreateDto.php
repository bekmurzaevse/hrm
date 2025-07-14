<?php

namespace App\Dto\v1\Candidate;

use App\Http\Requests\v1\Candidate\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public ?string $phone,
        public ?string $education,
        public ?string $experience,
        public ?string $photoUrl,
        public string $status,
    ) {}

    public static function from(CreateRequest $request): self
    {
        return new self(
            firstName: $request->first_name,
            lastName: $request->last_name,
            email: $request->email,
            phone: $request->phone,
            education: $request->education,
            experience: $request->experience,
            photoUrl: $request->photo_url,
            status: $request->status,
        );
    }
}