<?php

namespace App\Actions\v1\Finance;

use App\Dto\v1\Finance\CreateDto;
use App\Models\Finance;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Finance\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'type' => $dto->type,
            'client_id' => $dto->clientId,
            'vacancy_id' => $dto->vacancyId,
            'amount' => $dto->amount,
            'category' => $dto->category,
            'note' => $dto->note,
            'date' => $dto->date,
        ];

        Finance::create($data);

        return static::toResponse(
            message: 'Finance created'
        );
    }
}