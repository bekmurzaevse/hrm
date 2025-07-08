<?php

namespace App\Dto\v1\User;

use App\Http\Requests\v1\User\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $phone,
        public string $password,
    ) {
    }


    /**
     * Summary of from
     * @param \App\Http\Requests\v1\User\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            firstName: $request->first_name,
            lastName: $request->last_name,
            email: $request->email,
            phone: $request->phone,
            password: $request->password,
        );
    }
}
