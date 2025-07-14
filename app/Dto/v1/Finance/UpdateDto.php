<?php

namespace App\Dto\v1\Finance;

use App\Http\Requests\v1\Finance\UpdateRequest;

readonly class UpdateDto
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
     * @param \App\Http\Requests\v1\Finance\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            type: $request->get('type'),
            clientId: $request->get('client_id'),
            vacancyId: $request->get('vacancy_id'),
            amount: $request->get('amount'),
            category: $request->get('category'),
            note: $request->get('note'),
            date: $request->get('date')
        );
    }
}
