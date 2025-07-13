<?php

namespace App\Dto\v1\Finance;

use App\Http\Requests\v1\Finance\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public string $type,
        public int $clientId,
        public int $vacancyId,
        public float $amount,
        public string $category,
        public string $note,
        public string $date,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Finance\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            type: $request->get('type'),
            clientId: $request->get('clientId'),
            vacancyId: $request->get('vacancyId'),
            amount: $request->get('amount'),
            category: $request->get('category'),
            note: $request->get('note'),
            date: $request->get('date')
        );
    }
}
